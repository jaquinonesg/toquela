<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of socialnetController
 *
 * @author DESARROLLO2
 */
class SocialNetController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function facebook() {
        $error = true;
        $this->_view->assign('mensaje', '');

        $this->getLibrary('facebook-sdk' . DS . 'src' . DS . 'facebook');
        $config = array(
            'appId' => '481802038562506',
            'secret' => '6df73a0795ea2022f64c1a82244ab3c7',
        );

        $facebook = new Facebook($config);
        $user_id = $facebook->getUser();
        if ($user_id) {
            $facebook->getAccessToken();
            //freddy = 1153277509
            //hernan = 1033570129            

            try {
                $fql = 'SELECT username, 
                        name,
                        first_name, 
                        middle_name, 
                        last_name, 
                        pic_big, 
                        pic, email, locale, pic_cover, pic_small_with_logo, sex, online_presence from user where uid = ' . $user_id;
                $ret_obj = $facebook->api(array(
                    'method' => 'fql.query',
                    'query' => $fql,
                ));
                $faceuser = (object) $ret_obj[0];
                $users = DAOFactory::getUsersDAO()->queryByUsername($user_id);
                if (is_null($users)) {
                    $user = new Users();
                    $user->name = $faceuser->first_name . " " . $faceuser->middle_name;
                    $user->lastname = $faceuser->last_name;
                    $user->email = $faceuser->email;
                    $user->username = $user_id;
                    $user->codlocality = 3;
                    $user->codrole = 1;
                    $user->password = sha1($user->name);
                    $user->age = 1;
                    $user->skilledleg = "AMBAS";
                    $user->sex = "UNDEFINED";
                    $user->idho = $this->post('cedula');
                    $user->idfan = 1;
                    $user->coduser = DAOFactory::getUsersDAO()->insert($user);
                    $attachment = new Attachment;
                    $attachment->type = "image";
                    /* $attachment->path = $faceuser->pic; */
                    $attachment->path = $this->processimage($user, $faceuser->pic_big);
                    $attachment->description = "foto de perfil-facebook";
                    $attachment->nameencode = $attachment->namefile = $user->username;
                    $attachment->codattachment = DAOFactory::getAttachmentDAO()->insert($attachment);

                    $userattachment = new UserHasAttachment;
                    $userattachment->codattachment = $attachment->codattachment;
                    $userattachment->coduser = $user->coduser;
                    $userattachment->type = 'PROFILE';
                    DAOFactory::getUserHasAttachmentDAO()->insert($userattachment);
                    $this->_view->assign('mensaje', "Gracias por registrarte con nosotros a través de facebook");
                    $this->_view->assign('user', DAOFactory::getUsersDAO()->getUserWithPic($user->coduser));
                    $this->_sesion->user = $user;
                    $this->setuser($user->coduser);
                } else {
                    $this->_view->assign('user', DAOFactory::getUsersDAO()->getUserWithPic($users[0]->coduser));
                    $this->_view->assign('mensaje', "Gracias, ya estás registrado");
                    $this->_sesion->user = $users[0];
                    $this->setuser($users[0]->coduser);
                }
                $error = false;
            } catch (FacebookApiException $e) {
                $login_url = $facebook->getLoginUrl();
                $this->_view->assign('error', 'Ha ocurrido un problema con facebook, intenta más tarde' . $e->getMessage());
                $this->_view->assign('url', $login_url);
            }
        } else {
            $login_url = $facebook->getLoginUrl();
            $this->_view->assign('url', $login_url);
            //echo 'Por favor  <a style= "font-weigth: bold;"  href="' . $login_url . '">loguéate.</a>';
        }
        /* echo("<pre style='color: dimgray;background: black;padding: 50px 30px;font-family: Consolas;font-size: 8pt;word-wrap: break-word;'>" .
          print_r($user, true) .
          print_r("<br/>", true) .
          print_r($users, true) .
          print_r("<br/>", true) .
          print_r($user_id, true) .
          print_r("<br/>", true) .
          print_r($ret_obj, true) .
          "</pre>"); */

        if (!$error)
            $this->redireccionar("/perfil");

        $this->_view->assign('net', 'facebook');
        $this->_view->renderizar('social');
    }

    public function twitter() {
        $error = true;
        $this->_view->assign('mensaje', '');
        $this->getLibrary('twitteroauth' . DS . 'sdk' . DS . 'config');
        $this->getLibrary('twitteroauth' . DS . 'sdk' . DS . 'twitteroauth');
        $access_token = json_decode($this->_sesion->access_token);
        if (empty($access_token) || empty($access_token->oauth_token) || empty($access_token->oauth_token_secret)) {
            unset($this->_sesion->access_token);
            $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
            $request_token = $connection->getRequestToken(OAUTH_CALLBACK);
            $this->_sesion->oauth_token = $token = $request_token['oauth_token'];
            $this->_sesion->oauth_token_secret = $request_token['oauth_token_secret'];
            switch ($connection->http_code) {
                case 200:
                    $url = $connection->getAuthorizeURL($token);
                    $this->_view->assign('url', $url);
                    break;
                default:
                    $this->_view->assign('error', 'Could not connect to Twitter. Refresh the page or try again later.');
            }
        } else {
            $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token->oauth_token, $access_token->oauth_token_secret);
            $user_twitter = $connection->get('account/verify_credentials');
            $user = DAOFactory::getUsersDAO()->queryByUsername($user_twitter->id);
            if (is_null($user)) {
                $user = new Users();
                $user->name = $user_twitter->name;
                $user->username = $user_twitter->id;
                $user->codlocality = 3;
                $user->codrole = 1;
                $user->password = sha1($user->name);
                $user->age = 1;
                $user->skilledleg = "AMBAS";
                $user->sex = "UNDEFINED";
                $user->idho = $this->post('cedula');
                $user->idfan = 1;
                $user->coduser = DAOFactory::getUsersDAO()->insert($user);

                $attachment = new Attachment;
                $attachment->type = "image";
                $attachment->path = $this->processimage($user, $user_twitter->profile_image_url);
                $attachment->description = "foto de perfil-twitter";
                $attachment->nameencode = $attachment->namefile = $user->username;
                $attachment->codattachment = DAOFactory::getAttachmentDAO()->insert($attachment);

                $userattachment = new UserHasAttachment;
                $userattachment->codattachment = $attachment->codattachment;
                $userattachment->coduser = $user->coduser;
                $userattachment->type = 'PROFILE';
                DAOFactory::getUserHasAttachmentDAO()->insert($userattachment);

                echo "Gracias por registrarte con nosotros a través de twitter";
                $this->_sesion->user = $user;
                $this->_view->assign('user', DAOFactory::getUsersDAO()->getUserWithPic($user->coduser));
                $this->_view->assign('mensaje', "Gracias por registrarte con nosotros a través de twitter");
                $this->setuser($user->coduser);
            } else {
                $this->_sesion->user = $user[0];
                $this->_view->assign('user', DAOFactory::getUsersDAO()->getUserWithPic($user[0]->coduser));
                $this->_view->assign('mensaje', "Gracias, ya estás registrado por medio de twitter");
                $this->setuser($user[0]->coduser);
            }
            $error = false;
        }
        if (!$error)
            $this->redireccionar("/perfil");

        $this->_view->assign('net', 'twitter');
        $this->_view->renderizar('social');
    }

    public function twittercallback() {
        $this->getLibrary('twitteroauth' . DS . 'sdk' . DS . 'config');
        $this->getLibrary('twitteroauth' . DS . 'sdk' . DS . 'twitteroauth');

        if (isset($_REQUEST['oauth_token']) && $this->_sesion->oauth_token !== $_REQUEST['oauth_token']) {
            $this->_sesion->oauth_token = $this->_sesion->oauth_token_secret = null;
            unset($this->_sesion->oauth_token);
            unset($this->_sesion->oauth_token_secret);
        } else {
            $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $this->_sesion->oauth_token, $this->_sesion->oauth_token_secret);
            $access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
            $acc_tk = new stdClass;
            $acc_tk->oauth_token = $access_token['oauth_token'];
            $acc_tk->oauth_token_secret = $access_token['oauth_token_secret'];

            $this->_sesion->access_token = json_encode($acc_tk);
            unset($this->_sesion->oauth_token);
            unset($this->_sesion->oauth_token_secret);


            /* if (200 == $connection->http_code) {
              header('Location: index.php');
              } else {
              header('Location: clearsessions.php');
              } */
        }
        /* echo("<pre style='color: dimgray;background: black;padding: 50px 30px;font-family: Consolas;font-size: 8pt;word-wrap: break-word;'>" .
          print_r($this->_sesion, true) .
          print_r('<br>', true) .
          print_r($this->_sesion->access_token, true) .
          print_r('<br>', true) .
          print_r($this->_sesion->oauth_token, true) .
          "</pre>"); */
        $this->redireccionar('/socialnet/twitter');
    }

    public function index() {
        
    }

    private function processimage($user, $url) {
        $path = APP_ROOT . "public" . DS . "img" . DS . "users" . DS . sha1($user->coduser) . DS . "photos";
        @mkdir($path, 777, true);
        $tmp = file_get_contents($url);
        $namefile = time() . ".jpg";
        $pathfile = $path . DS . $namefile;
        if (is_resource($file = @fopen($pathfile, "w"))) {
            fputs($file, $tmp);
            fclose($file);
            $pathfile = "public" . SDS . "img" . SDS . "users" . SDS . sha1($user->coduser) . SDS . "photos" . SDS . $namefile;
        }
        return $pathfile;
    }

    private function setuser($cod_user) {
        sleep(1);
        $user = DAOFactory::getUsersDAO()->load($cod_user);
        $photoprofile = DAOFactory::getUserHasAttachmentDAO()->getPhotProfileUser($user->coduser);
        if (!is_null($photoprofile))
            $user->photoprofile = $photoprofile;

        $this->_sesion->user = $user;
        $this->_sesion->user->positiongame = DAOFactory::getUserHasVirtuesDAO()->getFavoritePostionGame($user->coduser);
        $this->_sesion->user->levelgame = DAOFactory::getUserHasVirtuesDAO()->getLevelGame($user->coduser);
        $this->_sesion->user->locality = DAOFactory::getLocalityDAO()->load($user->codlocality);
        $this->_sesion->user->fan = DAOFactory::getFanDAO()->load($user->idfan);
        sleep(2.5);
    }

}

?>
