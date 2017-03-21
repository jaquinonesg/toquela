<?php

class ToquelaController extends Controller {

    private $user;

    public function __construct() {
        parent::__construct();
        $this->validacionSession();
        $this->_view->setLayout('canchas');
        $this->user = $this->_sesion->user;
    }

    public function index() {
        $all_complex = DAOFactory::getComplexDAO()->queryAllOrderBy('name');
        if (isset($all_complex)) {
            $this->_view->assign('all_complex', $all_complex);
        }
        $this->_view->renderizar();
    }

    public function createcomplex() {
        if ($this->_request->isAjax()) {
            $complex = DAOFactory::getComplexDAO();
            $name_complex = $this->post('name_complex');
            $name_admin = $this->post('name_admin');
            $address = $this->post('address');
            $phone = $this->post('phone');
            $email = $this->post('email');
            $description = $this->post('description');
            $password = $this->post('password');


            if (!empty($password) && !empty($name_admin) && !empty($name_complex) && !empty($address) && !empty($phone) && !empty($email) && !empty($description) && $this->user->istoquela) {
                if (Util::isEmail($email)) {

                    $dtoComplex = new Complex();
                    $dtoComplex->address = $address;
                    $dtoComplex->description = $description;
                    $dtoComplex->email = $email;
                    $dtoComplex->name = $name_complex;
                    $dtoComplex->phone = $phone;
                    $id = $complex->insert($dtoComplex);




                    if (is_numeric($id)) {


                        $dtoAdmin = new Administrator();

                        $dtoAdmin->address = $address;
                        $dtoAdmin->codcomplex = $id;
                        $dtoAdmin->email = $email;
                        $dtoAdmin->iscomplex = 1;
                        $dtoAdmin->isdiary = 1;
                        $dtoAdmin->isindex = 1;
                        $dtoAdmin->isuser = 1;
                        $dtoAdmin->name = $name_admin;
                        $dtoAdmin->password = sha1($password);

                        $id_admin = DAOFactory::getAdministratorDAO()->insert($dtoAdmin);
                        if (is_numeric($id_admin)) {
                            $message = "Se ha creado la cancha correctamente.";
                            $this->endProcess($message, true);
                        } else {
                            $message = "Ha ocurrido un error creado el complejo, por favor vuelva a intentarlo.";
                            $this->endProcess($message);
                        }
                    } else {
                        $message = "Ha ocurrido un error creado el complejo, por favor vuelva a intentarlo.";
                        $this->endProcess($message);
                    }
                } else {
                    $message = "Debe ingresar una dirección de correo electrónico valido";
                    $this->endProcess($message);
                }
            } else {
                $message = "Ha ocurrido un error en la validación, por favor vuelva a intentarlo.";
                $this->endProcess($message);
            }
        }
    }

    public function endProcess($message, $status = false) {
        $this->_view->_print(array('message' => $message, 'status' => $status));
        exit();
    }

    public function deletetoquela() {
        if ($this->_request->isAjax()) {
            if ($this->user->istoquela) {

                $code = $this->post('code');
                $complex = DAOFactory::getComplexDAO();
                $dtoComplex = $complex->load($code);

                if (is_object($dtoComplex)) {
                    try {

                        $count = DAOFactory::getComplexHasAttachmentDAO()->hasReserve($code);

                        if ($count == 0) {


                            $attachtments = $complex->getAttachments($code);
                            DAOFactory::getComplexHasAttachmentDAO()->deleteByComplex($code);
                            //eliminar los adjuntos
                            if (!empty($attachtments)) {
                                foreach ($attachtments as $attachtment) {
                                    $this->delete($attachtment->path);
                                    DAOFactory::getAttachmentDAO()->delete($attachtment->cod_attachment);
                                }
                            }

                            DAOFactory::getFavoritesComplexDAO()->deleteByComplex($code);

                            //eliminar los administradores
                            DAOFactory::getAdministratorDAO()->deleteByCodComplex($code);
                            //eliminar canchas
                            DAOFactory::getSubComplexDAO()->deleteByCodComplex($code);
                            //eliminar complejo
                            $complex->delete($code);
                            $messsage = "Se ha eliminado el complejo, con sus adjuntos y administradores.";
                            $this->endProcess($messsage, true);
                        } else {
                            $messsage = "El complejo que intenta eliminar tiene reservas asignadas.";
                            $this->endProcess($messsage);
                        }
                    } catch (Exception $exc) {
                        $messsage = "Ha ocurrido un error eliminado el complejo, por favor vuelva a intentarlo.";
                        $this->endProcess($messsage);
                    }
                }
            }
        }
    }

    private function delete($path) {
        if (!empty($path)) {
            if (@unlink(APP_ROOT . 'public' . $path)) {
                return true;
            }
        }
        return false;
    }

}
