<?php 
 
/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: 2014-06-27 15:24
 */
class DAOFactory{

    /**
     * @return Aditional
     */
    public static function getAditionalDAO() {
        return new AditionalMySqlExtDAO();
    }

    /**
     * @return Administrator
     */
    public static function getAdministratorDAO() {
        return new AdministratorMySqlExtDAO();
    }

    /**
     * @return Attachment
     */
    public static function getAttachmentDAO() {
        return new AttachmentMySqlExtDAO();
    }

    /**
     * @return Carnet
     */
    public static function getCarnetDAO() {
        return new CarnetMySqlExtDAO();
    }

    /**
     * @return City
     */
    public static function getCityDAO() {
        return new CityMySqlExtDAO();
    }

    /**
     * @return Comment
     */
    public static function getCommentDAO() {
        return new CommentMySqlExtDAO();
    }

    /**
     * @return Complex
     */
    public static function getComplexDAO() {
        return new ComplexMySqlExtDAO();
    }

    /**
     * @return ComplexHasAttachment
     */
    public static function getComplexHasAttachmentDAO() {
        return new ComplexHasAttachmentMySqlExtDAO();
    }

    /**
     * @return ComplexHasQualification
     */
    public static function getComplexHasQualificationDAO() {
        return new ComplexHasQualificationMySqlExtDAO();
    }

    /**
     * @return Country
     */
    public static function getCountryDAO() {
        return new CountryMySqlExtDAO();
    }

    /**
     * @return Disponibility
     */
    public static function getDisponibilityDAO() {
        return new DisponibilityMySqlExtDAO();
    }

    /**
     * @return DisponibilityComplex
     */
    public static function getDisponibilityComplexDAO() {
        return new DisponibilityComplexMySqlExtDAO();
    }

    /**
     * @return Domain
     */
    public static function getDomainDAO() {
        return new DomainMySqlExtDAO();
    }

    /**
     * @return Experience
     */
    public static function getExperienceDAO() {
        return new ExperienceMySqlExtDAO();
    }

    /**
     * @return Fan
     */
    public static function getFanDAO() {
        return new FanMySqlExtDAO();
    }

    /**
     * @return FavoritesComplex
     */
    public static function getFavoritesComplexDAO() {
        return new FavoritesComplexMySqlExtDAO();
    }

    /**
     * @return FavoritesMatch
     */
    public static function getFavoritesMatchDAO() {
        return new FavoritesMatchMySqlExtDAO();
    }

    /**
     * @return Followers
     */
    public static function getFollowersDAO() {
        return new FollowersMySqlExtDAO();
    }

    /**
     * @return Games
     */
    public static function getGamesDAO() {
        return new GamesMySqlExtDAO();
    }

    /**
     * @return Group
     */
    public static function getGroupDAO() {
        return new GroupMySqlExtDAO();
    }

    /**
     * @return Language
     */
    public static function getLanguageDAO() {
        return new LanguageMySqlExtDAO();
    }

    /**
     * @return Locality
     */
    public static function getLocalityDAO() {
        return new LocalityMySqlExtDAO();
    }

    /**
     * @return Mailtemp
     */
    public static function getMailtempDAO() {
        return new MailtempMySqlExtDAO();
    }

    /**
     * @return Match
     */
    public static function getMatchDAO() {
        return new MatchMysqlExtDAO();
    }

    /**
     * @return MdlAssign
     */
    public static function getMdlAssignDAO() {
        return new MdlAssignMySqlExtDAO();
    }

    /**
     * @return MdlAssignGrades
     */
    public static function getMdlAssignGradesDAO() {
        return new MdlAssignGradesMySqlExtDAO();
    }

    /**
     * @return MdlAssignPluginConfig
     */
    public static function getMdlAssignPluginConfigDAO() {
        return new MdlAssignPluginConfigMySqlExtDAO();
    }

    /**
     * @return MdlAssignSubmission
     */
    public static function getMdlAssignSubmissionDAO() {
        return new MdlAssignSubmissionMySqlExtDAO();
    }

    /**
     * @return MdlAssignUserFlags
     */
    public static function getMdlAssignUserFlagsDAO() {
        return new MdlAssignUserFlagsMySqlExtDAO();
    }

    /**
     * @return MdlAssignUserMapping
     */
    public static function getMdlAssignUserMappingDAO() {
        return new MdlAssignUserMappingMySqlExtDAO();
    }

    /**
     * @return MdlAssignfeedbackComments
     */
    public static function getMdlAssignfeedbackCommentsDAO() {
        return new MdlAssignfeedbackCommentsMySqlExtDAO();
    }

    /**
     * @return MdlAssignfeedbackEditpdfAnnot
     */
    public static function getMdlAssignfeedbackEditpdfAnnotDAO() {
        return new MdlAssignfeedbackEditpdfAnnotMySqlExtDAO();
    }

    /**
     * @return MdlAssignfeedbackEditpdfCmnt
     */
    public static function getMdlAssignfeedbackEditpdfCmntDAO() {
        return new MdlAssignfeedbackEditpdfCmntMySqlExtDAO();
    }

    /**
     * @return MdlAssignfeedbackEditpdfQuick
     */
    public static function getMdlAssignfeedbackEditpdfQuickDAO() {
        return new MdlAssignfeedbackEditpdfQuickMySqlExtDAO();
    }

    /**
     * @return MdlAssignfeedbackFile
     */
    public static function getMdlAssignfeedbackFileDAO() {
        return new MdlAssignfeedbackFileMySqlExtDAO();
    }

    /**
     * @return MdlAssignment
     */
    public static function getMdlAssignmentDAO() {
        return new MdlAssignmentMySqlExtDAO();
    }

    /**
     * @return MdlAssignmentSubmissions
     */
    public static function getMdlAssignmentSubmissionsDAO() {
        return new MdlAssignmentSubmissionsMySqlExtDAO();
    }

    /**
     * @return MdlAssignsubmissionFile
     */
    public static function getMdlAssignsubmissionFileDAO() {
        return new MdlAssignsubmissionFileMySqlExtDAO();
    }

    /**
     * @return MdlAssignsubmissionOnlinetext
     */
    public static function getMdlAssignsubmissionOnlinetextDAO() {
        return new MdlAssignsubmissionOnlinetextMySqlExtDAO();
    }

    /**
     * @return MdlBackupControllers
     */
    public static function getMdlBackupControllersDAO() {
        return new MdlBackupControllersMySqlExtDAO();
    }

    /**
     * @return MdlBackupCourses
     */
    public static function getMdlBackupCoursesDAO() {
        return new MdlBackupCoursesMySqlExtDAO();
    }

    /**
     * @return MdlBackupLogs
     */
    public static function getMdlBackupLogsDAO() {
        return new MdlBackupLogsMySqlExtDAO();
    }

    /**
     * @return MdlBadge
     */
    public static function getMdlBadgeDAO() {
        return new MdlBadgeMySqlExtDAO();
    }

    /**
     * @return MdlBadgeBackpack
     */
    public static function getMdlBadgeBackpackDAO() {
        return new MdlBadgeBackpackMySqlExtDAO();
    }

    /**
     * @return MdlBadgeCriteria
     */
    public static function getMdlBadgeCriteriaDAO() {
        return new MdlBadgeCriteriaMySqlExtDAO();
    }

    /**
     * @return MdlBadgeCriteriaMet
     */
    public static function getMdlBadgeCriteriaMetDAO() {
        return new MdlBadgeCriteriaMetMySqlExtDAO();
    }

    /**
     * @return MdlBadgeCriteriaParam
     */
    public static function getMdlBadgeCriteriaParamDAO() {
        return new MdlBadgeCriteriaParamMySqlExtDAO();
    }

    /**
     * @return MdlBadgeExternal
     */
    public static function getMdlBadgeExternalDAO() {
        return new MdlBadgeExternalMySqlExtDAO();
    }

    /**
     * @return MdlBadgeIssued
     */
    public static function getMdlBadgeIssuedDAO() {
        return new MdlBadgeIssuedMySqlExtDAO();
    }

    /**
     * @return MdlBadgeManualAward
     */
    public static function getMdlBadgeManualAwardDAO() {
        return new MdlBadgeManualAwardMySqlExtDAO();
    }

    /**
     * @return MdlBlock
     */
    public static function getMdlBlockDAO() {
        return new MdlBlockMySqlExtDAO();
    }

    /**
     * @return MdlBlockCommunity
     */
    public static function getMdlBlockCommunityDAO() {
        return new MdlBlockCommunityMySqlExtDAO();
    }

    /**
     * @return MdlBlockInstances
     */
    public static function getMdlBlockInstancesDAO() {
        return new MdlBlockInstancesMySqlExtDAO();
    }

    /**
     * @return MdlBlockPositions
     */
    public static function getMdlBlockPositionsDAO() {
        return new MdlBlockPositionsMySqlExtDAO();
    }

    /**
     * @return MdlBlockRssClient
     */
    public static function getMdlBlockRssClientDAO() {
        return new MdlBlockRssClientMySqlExtDAO();
    }

    /**
     * @return MdlBlogAssociation
     */
    public static function getMdlBlogAssociationDAO() {
        return new MdlBlogAssociationMySqlExtDAO();
    }

    /**
     * @return MdlBlogExternal
     */
    public static function getMdlBlogExternalDAO() {
        return new MdlBlogExternalMySqlExtDAO();
    }

    /**
     * @return MdlBook
     */
    public static function getMdlBookDAO() {
        return new MdlBookMySqlExtDAO();
    }

    /**
     * @return MdlBookChapters
     */
    public static function getMdlBookChaptersDAO() {
        return new MdlBookChaptersMySqlExtDAO();
    }

    /**
     * @return MdlCacheFilters
     */
    public static function getMdlCacheFiltersDAO() {
        return new MdlCacheFiltersMySqlExtDAO();
    }

    /**
     * @return MdlCacheFlags
     */
    public static function getMdlCacheFlagsDAO() {
        return new MdlCacheFlagsMySqlExtDAO();
    }

    /**
     * @return MdlCacheText
     */
    public static function getMdlCacheTextDAO() {
        return new MdlCacheTextMySqlExtDAO();
    }

    /**
     * @return MdlCapabilities
     */
    public static function getMdlCapabilitiesDAO() {
        return new MdlCapabilitiesMySqlExtDAO();
    }

    /**
     * @return MdlChat
     */
    public static function getMdlChatDAO() {
        return new MdlChatMySqlExtDAO();
    }

    /**
     * @return MdlChatMessages
     */
    public static function getMdlChatMessagesDAO() {
        return new MdlChatMessagesMySqlExtDAO();
    }

    /**
     * @return MdlChatMessagesCurrent
     */
    public static function getMdlChatMessagesCurrentDAO() {
        return new MdlChatMessagesCurrentMySqlExtDAO();
    }

    /**
     * @return MdlChatUsers
     */
    public static function getMdlChatUsersDAO() {
        return new MdlChatUsersMySqlExtDAO();
    }

    /**
     * @return MdlChoice
     */
    public static function getMdlChoiceDAO() {
        return new MdlChoiceMySqlExtDAO();
    }

    /**
     * @return MdlChoiceAnswers
     */
    public static function getMdlChoiceAnswersDAO() {
        return new MdlChoiceAnswersMySqlExtDAO();
    }

    /**
     * @return MdlChoiceOptions
     */
    public static function getMdlChoiceOptionsDAO() {
        return new MdlChoiceOptionsMySqlExtDAO();
    }

    /**
     * @return MdlCohort
     */
    public static function getMdlCohortDAO() {
        return new MdlCohortMySqlExtDAO();
    }

    /**
     * @return MdlCohortMembers
     */
    public static function getMdlCohortMembersDAO() {
        return new MdlCohortMembersMySqlExtDAO();
    }

    /**
     * @return MdlComments
     */
    public static function getMdlCommentsDAO() {
        return new MdlCommentsMySqlExtDAO();
    }

    /**
     * @return MdlConfig
     */
    public static function getMdlConfigDAO() {
        return new MdlConfigMySqlExtDAO();
    }

    /**
     * @return MdlConfigLog
     */
    public static function getMdlConfigLogDAO() {
        return new MdlConfigLogMySqlExtDAO();
    }

    /**
     * @return MdlConfigPlugins
     */
    public static function getMdlConfigPluginsDAO() {
        return new MdlConfigPluginsMySqlExtDAO();
    }

    /**
     * @return MdlContext
     */
    public static function getMdlContextDAO() {
        return new MdlContextMySqlExtDAO();
    }

    /**
     * @return MdlContextTemp
     */
    public static function getMdlContextTempDAO() {
        return new MdlContextTempMySqlExtDAO();
    }

    /**
     * @return MdlCourse
     */
    public static function getMdlCourseDAO() {
        return new MdlCourseMySqlExtDAO();
    }

    /**
     * @return MdlCourseCategories
     */
    public static function getMdlCourseCategoriesDAO() {
        return new MdlCourseCategoriesMySqlExtDAO();
    }

    /**
     * @return MdlCourseCompletionAggrMethd
     */
    public static function getMdlCourseCompletionAggrMethdDAO() {
        return new MdlCourseCompletionAggrMethdMySqlExtDAO();
    }

    /**
     * @return MdlCourseCompletionCritCompl
     */
    public static function getMdlCourseCompletionCritComplDAO() {
        return new MdlCourseCompletionCritComplMySqlExtDAO();
    }

    /**
     * @return MdlCourseCompletionCriteria
     */
    public static function getMdlCourseCompletionCriteriaDAO() {
        return new MdlCourseCompletionCriteriaMySqlExtDAO();
    }

    /**
     * @return MdlCourseCompletions
     */
    public static function getMdlCourseCompletionsDAO() {
        return new MdlCourseCompletionsMySqlExtDAO();
    }

    /**
     * @return MdlCourseFormatOptions
     */
    public static function getMdlCourseFormatOptionsDAO() {
        return new MdlCourseFormatOptionsMySqlExtDAO();
    }

    /**
     * @return MdlCourseModules
     */
    public static function getMdlCourseModulesDAO() {
        return new MdlCourseModulesMySqlExtDAO();
    }

    /**
     * @return MdlCourseModulesAvailFields
     */
    public static function getMdlCourseModulesAvailFieldsDAO() {
        return new MdlCourseModulesAvailFieldsMySqlExtDAO();
    }

    /**
     * @return MdlCourseModulesAvailability
     */
    public static function getMdlCourseModulesAvailabilityDAO() {
        return new MdlCourseModulesAvailabilityMySqlExtDAO();
    }

    /**
     * @return MdlCourseModulesCompletion
     */
    public static function getMdlCourseModulesCompletionDAO() {
        return new MdlCourseModulesCompletionMySqlExtDAO();
    }

    /**
     * @return MdlCoursePublished
     */
    public static function getMdlCoursePublishedDAO() {
        return new MdlCoursePublishedMySqlExtDAO();
    }

    /**
     * @return MdlCourseRequest
     */
    public static function getMdlCourseRequestDAO() {
        return new MdlCourseRequestMySqlExtDAO();
    }

    /**
     * @return MdlCourseSections
     */
    public static function getMdlCourseSectionsDAO() {
        return new MdlCourseSectionsMySqlExtDAO();
    }

    /**
     * @return MdlCourseSectionsAvailFields
     */
    public static function getMdlCourseSectionsAvailFieldsDAO() {
        return new MdlCourseSectionsAvailFieldsMySqlExtDAO();
    }

    /**
     * @return MdlCourseSectionsAvailability
     */
    public static function getMdlCourseSectionsAvailabilityDAO() {
        return new MdlCourseSectionsAvailabilityMySqlExtDAO();
    }

    /**
     * @return MdlData
     */
    public static function getMdlDataDAO() {
        return new MdlDataMySqlExtDAO();
    }

    /**
     * @return MdlDataContent
     */
    public static function getMdlDataContentDAO() {
        return new MdlDataContentMySqlExtDAO();
    }

    /**
     * @return MdlDataFields
     */
    public static function getMdlDataFieldsDAO() {
        return new MdlDataFieldsMySqlExtDAO();
    }

    /**
     * @return MdlDataRecords
     */
    public static function getMdlDataRecordsDAO() {
        return new MdlDataRecordsMySqlExtDAO();
    }

    /**
     * @return MdlEnrol
     */
    public static function getMdlEnrolDAO() {
        return new MdlEnrolMySqlExtDAO();
    }

    /**
     * @return MdlEnrolFlatfile
     */
    public static function getMdlEnrolFlatfileDAO() {
        return new MdlEnrolFlatfileMySqlExtDAO();
    }

    /**
     * @return MdlEnrolPaypal
     */
    public static function getMdlEnrolPaypalDAO() {
        return new MdlEnrolPaypalMySqlExtDAO();
    }

    /**
     * @return MdlEvent
     */
    public static function getMdlEventDAO() {
        return new MdlEventMySqlExtDAO();
    }

    /**
     * @return MdlEventSubscriptions
     */
    public static function getMdlEventSubscriptionsDAO() {
        return new MdlEventSubscriptionsMySqlExtDAO();
    }

    /**
     * @return MdlEventsHandlers
     */
    public static function getMdlEventsHandlersDAO() {
        return new MdlEventsHandlersMySqlExtDAO();
    }

    /**
     * @return MdlEventsQueue
     */
    public static function getMdlEventsQueueDAO() {
        return new MdlEventsQueueMySqlExtDAO();
    }

    /**
     * @return MdlEventsQueueHandlers
     */
    public static function getMdlEventsQueueHandlersDAO() {
        return new MdlEventsQueueHandlersMySqlExtDAO();
    }

    /**
     * @return MdlExternalFunctions
     */
    public static function getMdlExternalFunctionsDAO() {
        return new MdlExternalFunctionsMySqlExtDAO();
    }

    /**
     * @return MdlExternalServices
     */
    public static function getMdlExternalServicesDAO() {
        return new MdlExternalServicesMySqlExtDAO();
    }

    /**
     * @return MdlExternalServicesFunctions
     */
    public static function getMdlExternalServicesFunctionsDAO() {
        return new MdlExternalServicesFunctionsMySqlExtDAO();
    }

    /**
     * @return MdlExternalServicesUsers
     */
    public static function getMdlExternalServicesUsersDAO() {
        return new MdlExternalServicesUsersMySqlExtDAO();
    }

    /**
     * @return MdlExternalTokens
     */
    public static function getMdlExternalTokensDAO() {
        return new MdlExternalTokensMySqlExtDAO();
    }

    /**
     * @return MdlFeedback
     */
    public static function getMdlFeedbackDAO() {
        return new MdlFeedbackMySqlExtDAO();
    }

    /**
     * @return MdlFeedbackCompleted
     */
    public static function getMdlFeedbackCompletedDAO() {
        return new MdlFeedbackCompletedMySqlExtDAO();
    }

    /**
     * @return MdlFeedbackCompletedtmp
     */
    public static function getMdlFeedbackCompletedtmpDAO() {
        return new MdlFeedbackCompletedtmpMySqlExtDAO();
    }

    /**
     * @return MdlFeedbackItem
     */
    public static function getMdlFeedbackItemDAO() {
        return new MdlFeedbackItemMySqlExtDAO();
    }

    /**
     * @return MdlFeedbackSitecourseMap
     */
    public static function getMdlFeedbackSitecourseMapDAO() {
        return new MdlFeedbackSitecourseMapMySqlExtDAO();
    }

    /**
     * @return MdlFeedbackTemplate
     */
    public static function getMdlFeedbackTemplateDAO() {
        return new MdlFeedbackTemplateMySqlExtDAO();
    }

    /**
     * @return MdlFeedbackTracking
     */
    public static function getMdlFeedbackTrackingDAO() {
        return new MdlFeedbackTrackingMySqlExtDAO();
    }

    /**
     * @return MdlFeedbackValue
     */
    public static function getMdlFeedbackValueDAO() {
        return new MdlFeedbackValueMySqlExtDAO();
    }

    /**
     * @return MdlFeedbackValuetmp
     */
    public static function getMdlFeedbackValuetmpDAO() {
        return new MdlFeedbackValuetmpMySqlExtDAO();
    }

    /**
     * @return MdlFiles
     */
    public static function getMdlFilesDAO() {
        return new MdlFilesMySqlExtDAO();
    }

    /**
     * @return MdlFilesReference
     */
    public static function getMdlFilesReferenceDAO() {
        return new MdlFilesReferenceMySqlExtDAO();
    }

    /**
     * @return MdlFilterActive
     */
    public static function getMdlFilterActiveDAO() {
        return new MdlFilterActiveMySqlExtDAO();
    }

    /**
     * @return MdlFilterConfig
     */
    public static function getMdlFilterConfigDAO() {
        return new MdlFilterConfigMySqlExtDAO();
    }

    /**
     * @return MdlFolder
     */
    public static function getMdlFolderDAO() {
        return new MdlFolderMySqlExtDAO();
    }

    /**
     * @return MdlForum
     */
    public static function getMdlForumDAO() {
        return new MdlForumMySqlExtDAO();
    }

    /**
     * @return MdlForumDigests
     */
    public static function getMdlForumDigestsDAO() {
        return new MdlForumDigestsMySqlExtDAO();
    }

    /**
     * @return MdlForumDiscussions
     */
    public static function getMdlForumDiscussionsDAO() {
        return new MdlForumDiscussionsMySqlExtDAO();
    }

    /**
     * @return MdlForumPosts
     */
    public static function getMdlForumPostsDAO() {
        return new MdlForumPostsMySqlExtDAO();
    }

    /**
     * @return MdlForumQueue
     */
    public static function getMdlForumQueueDAO() {
        return new MdlForumQueueMySqlExtDAO();
    }

    /**
     * @return MdlForumRead
     */
    public static function getMdlForumReadDAO() {
        return new MdlForumReadMySqlExtDAO();
    }

    /**
     * @return MdlForumSubscriptions
     */
    public static function getMdlForumSubscriptionsDAO() {
        return new MdlForumSubscriptionsMySqlExtDAO();
    }

    /**
     * @return MdlForumTrackPrefs
     */
    public static function getMdlForumTrackPrefsDAO() {
        return new MdlForumTrackPrefsMySqlExtDAO();
    }

    /**
     * @return MdlGlossary
     */
    public static function getMdlGlossaryDAO() {
        return new MdlGlossaryMySqlExtDAO();
    }

    /**
     * @return MdlGlossaryAlias
     */
    public static function getMdlGlossaryAliasDAO() {
        return new MdlGlossaryAliasMySqlExtDAO();
    }

    /**
     * @return MdlGlossaryCategories
     */
    public static function getMdlGlossaryCategoriesDAO() {
        return new MdlGlossaryCategoriesMySqlExtDAO();
    }

    /**
     * @return MdlGlossaryEntries
     */
    public static function getMdlGlossaryEntriesDAO() {
        return new MdlGlossaryEntriesMySqlExtDAO();
    }

    /**
     * @return MdlGlossaryEntriesCategories
     */
    public static function getMdlGlossaryEntriesCategoriesDAO() {
        return new MdlGlossaryEntriesCategoriesMySqlExtDAO();
    }

    /**
     * @return MdlGlossaryFormats
     */
    public static function getMdlGlossaryFormatsDAO() {
        return new MdlGlossaryFormatsMySqlExtDAO();
    }

    /**
     * @return MdlGradeCategories
     */
    public static function getMdlGradeCategoriesDAO() {
        return new MdlGradeCategoriesMySqlExtDAO();
    }

    /**
     * @return MdlGradeCategoriesHistory
     */
    public static function getMdlGradeCategoriesHistoryDAO() {
        return new MdlGradeCategoriesHistoryMySqlExtDAO();
    }

    /**
     * @return MdlGradeGrades
     */
    public static function getMdlGradeGradesDAO() {
        return new MdlGradeGradesMySqlExtDAO();
    }

    /**
     * @return MdlGradeGradesHistory
     */
    public static function getMdlGradeGradesHistoryDAO() {
        return new MdlGradeGradesHistoryMySqlExtDAO();
    }

    /**
     * @return MdlGradeImportNewitem
     */
    public static function getMdlGradeImportNewitemDAO() {
        return new MdlGradeImportNewitemMySqlExtDAO();
    }

    /**
     * @return MdlGradeImportValues
     */
    public static function getMdlGradeImportValuesDAO() {
        return new MdlGradeImportValuesMySqlExtDAO();
    }

    /**
     * @return MdlGradeItems
     */
    public static function getMdlGradeItemsDAO() {
        return new MdlGradeItemsMySqlExtDAO();
    }

    /**
     * @return MdlGradeItemsHistory
     */
    public static function getMdlGradeItemsHistoryDAO() {
        return new MdlGradeItemsHistoryMySqlExtDAO();
    }

    /**
     * @return MdlGradeLetters
     */
    public static function getMdlGradeLettersDAO() {
        return new MdlGradeLettersMySqlExtDAO();
    }

    /**
     * @return MdlGradeOutcomes
     */
    public static function getMdlGradeOutcomesDAO() {
        return new MdlGradeOutcomesMySqlExtDAO();
    }

    /**
     * @return MdlGradeOutcomesCourses
     */
    public static function getMdlGradeOutcomesCoursesDAO() {
        return new MdlGradeOutcomesCoursesMySqlExtDAO();
    }

    /**
     * @return MdlGradeOutcomesHistory
     */
    public static function getMdlGradeOutcomesHistoryDAO() {
        return new MdlGradeOutcomesHistoryMySqlExtDAO();
    }

    /**
     * @return MdlGradeSettings
     */
    public static function getMdlGradeSettingsDAO() {
        return new MdlGradeSettingsMySqlExtDAO();
    }

    /**
     * @return MdlGradingAreas
     */
    public static function getMdlGradingAreasDAO() {
        return new MdlGradingAreasMySqlExtDAO();
    }

    /**
     * @return MdlGradingDefinitions
     */
    public static function getMdlGradingDefinitionsDAO() {
        return new MdlGradingDefinitionsMySqlExtDAO();
    }

    /**
     * @return MdlGradingInstances
     */
    public static function getMdlGradingInstancesDAO() {
        return new MdlGradingInstancesMySqlExtDAO();
    }

    /**
     * @return MdlGradingformGuideComments
     */
    public static function getMdlGradingformGuideCommentsDAO() {
        return new MdlGradingformGuideCommentsMySqlExtDAO();
    }

    /**
     * @return MdlGradingformGuideCriteria
     */
    public static function getMdlGradingformGuideCriteriaDAO() {
        return new MdlGradingformGuideCriteriaMySqlExtDAO();
    }

    /**
     * @return MdlGradingformGuideFillings
     */
    public static function getMdlGradingformGuideFillingsDAO() {
        return new MdlGradingformGuideFillingsMySqlExtDAO();
    }

    /**
     * @return MdlGradingformRubricCriteria
     */
    public static function getMdlGradingformRubricCriteriaDAO() {
        return new MdlGradingformRubricCriteriaMySqlExtDAO();
    }

    /**
     * @return MdlGradingformRubricFillings
     */
    public static function getMdlGradingformRubricFillingsDAO() {
        return new MdlGradingformRubricFillingsMySqlExtDAO();
    }

    /**
     * @return MdlGradingformRubricLevels
     */
    public static function getMdlGradingformRubricLevelsDAO() {
        return new MdlGradingformRubricLevelsMySqlExtDAO();
    }

    /**
     * @return MdlGroupings
     */
    public static function getMdlGroupingsDAO() {
        return new MdlGroupingsMySqlExtDAO();
    }

    /**
     * @return MdlGroupingsGroups
     */
    public static function getMdlGroupingsGroupsDAO() {
        return new MdlGroupingsGroupsMySqlExtDAO();
    }

    /**
     * @return MdlGroups
     */
    public static function getMdlGroupsDAO() {
        return new MdlGroupsMySqlExtDAO();
    }

    /**
     * @return MdlGroupsMembers
     */
    public static function getMdlGroupsMembersDAO() {
        return new MdlGroupsMembersMySqlExtDAO();
    }

    /**
     * @return MdlImscp
     */
    public static function getMdlImscpDAO() {
        return new MdlImscpMySqlExtDAO();
    }

    /**
     * @return MdlLabel
     */
    public static function getMdlLabelDAO() {
        return new MdlLabelMySqlExtDAO();
    }

    /**
     * @return MdlLesson
     */
    public static function getMdlLessonDAO() {
        return new MdlLessonMySqlExtDAO();
    }

    /**
     * @return MdlLessonAnswers
     */
    public static function getMdlLessonAnswersDAO() {
        return new MdlLessonAnswersMySqlExtDAO();
    }

    /**
     * @return MdlLessonAttempts
     */
    public static function getMdlLessonAttemptsDAO() {
        return new MdlLessonAttemptsMySqlExtDAO();
    }

    /**
     * @return MdlLessonBranch
     */
    public static function getMdlLessonBranchDAO() {
        return new MdlLessonBranchMySqlExtDAO();
    }

    /**
     * @return MdlLessonGrades
     */
    public static function getMdlLessonGradesDAO() {
        return new MdlLessonGradesMySqlExtDAO();
    }

    /**
     * @return MdlLessonHighScores
     */
    public static function getMdlLessonHighScoresDAO() {
        return new MdlLessonHighScoresMySqlExtDAO();
    }

    /**
     * @return MdlLessonPages
     */
    public static function getMdlLessonPagesDAO() {
        return new MdlLessonPagesMySqlExtDAO();
    }

    /**
     * @return MdlLessonTimer
     */
    public static function getMdlLessonTimerDAO() {
        return new MdlLessonTimerMySqlExtDAO();
    }

    /**
     * @return MdlLicense
     */
    public static function getMdlLicenseDAO() {
        return new MdlLicenseMySqlExtDAO();
    }

    /**
     * @return MdlLog
     */
    public static function getMdlLogDAO() {
        return new MdlLogMySqlExtDAO();
    }

    /**
     * @return MdlLogDisplay
     */
    public static function getMdlLogDisplayDAO() {
        return new MdlLogDisplayMySqlExtDAO();
    }

    /**
     * @return MdlLogQueries
     */
    public static function getMdlLogQueriesDAO() {
        return new MdlLogQueriesMySqlExtDAO();
    }

    /**
     * @return MdlLti
     */
    public static function getMdlLtiDAO() {
        return new MdlLtiMySqlExtDAO();
    }

    /**
     * @return MdlLtiSubmission
     */
    public static function getMdlLtiSubmissionDAO() {
        return new MdlLtiSubmissionMySqlExtDAO();
    }

    /**
     * @return MdlLtiTypes
     */
    public static function getMdlLtiTypesDAO() {
        return new MdlLtiTypesMySqlExtDAO();
    }

    /**
     * @return MdlLtiTypesConfig
     */
    public static function getMdlLtiTypesConfigDAO() {
        return new MdlLtiTypesConfigMySqlExtDAO();
    }

    /**
     * @return MdlMessage
     */
    public static function getMdlMessageDAO() {
        return new MdlMessageMySqlExtDAO();
    }

    /**
     * @return MdlMessageContacts
     */
    public static function getMdlMessageContactsDAO() {
        return new MdlMessageContactsMySqlExtDAO();
    }

    /**
     * @return MdlMessageProcessors
     */
    public static function getMdlMessageProcessorsDAO() {
        return new MdlMessageProcessorsMySqlExtDAO();
    }

    /**
     * @return MdlMessageProviders
     */
    public static function getMdlMessageProvidersDAO() {
        return new MdlMessageProvidersMySqlExtDAO();
    }

    /**
     * @return MdlMessageRead
     */
    public static function getMdlMessageReadDAO() {
        return new MdlMessageReadMySqlExtDAO();
    }

    /**
     * @return MdlMessageWorking
     */
    public static function getMdlMessageWorkingDAO() {
        return new MdlMessageWorkingMySqlExtDAO();
    }

    /**
     * @return MdlMnetApplication
     */
    public static function getMdlMnetApplicationDAO() {
        return new MdlMnetApplicationMySqlExtDAO();
    }

    /**
     * @return MdlMnetHost
     */
    public static function getMdlMnetHostDAO() {
        return new MdlMnetHostMySqlExtDAO();
    }

    /**
     * @return MdlMnetHost2service
     */
    public static function getMdlMnetHost2serviceDAO() {
        return new MdlMnetHost2serviceMySqlExtDAO();
    }

    /**
     * @return MdlMnetLog
     */
    public static function getMdlMnetLogDAO() {
        return new MdlMnetLogMySqlExtDAO();
    }

    /**
     * @return MdlMnetRemoteRpc
     */
    public static function getMdlMnetRemoteRpcDAO() {
        return new MdlMnetRemoteRpcMySqlExtDAO();
    }

    /**
     * @return MdlMnetRemoteService2rpc
     */
    public static function getMdlMnetRemoteService2rpcDAO() {
        return new MdlMnetRemoteService2rpcMySqlExtDAO();
    }

    /**
     * @return MdlMnetRpc
     */
    public static function getMdlMnetRpcDAO() {
        return new MdlMnetRpcMySqlExtDAO();
    }

    /**
     * @return MdlMnetService
     */
    public static function getMdlMnetServiceDAO() {
        return new MdlMnetServiceMySqlExtDAO();
    }

    /**
     * @return MdlMnetService2rpc
     */
    public static function getMdlMnetService2rpcDAO() {
        return new MdlMnetService2rpcMySqlExtDAO();
    }

    /**
     * @return MdlMnetSession
     */
    public static function getMdlMnetSessionDAO() {
        return new MdlMnetSessionMySqlExtDAO();
    }

    /**
     * @return MdlMnetSsoAccessControl
     */
    public static function getMdlMnetSsoAccessControlDAO() {
        return new MdlMnetSsoAccessControlMySqlExtDAO();
    }

    /**
     * @return MdlMnetserviceEnrolCourses
     */
    public static function getMdlMnetserviceEnrolCoursesDAO() {
        return new MdlMnetserviceEnrolCoursesMySqlExtDAO();
    }

    /**
     * @return MdlMnetserviceEnrolEnrolments
     */
    public static function getMdlMnetserviceEnrolEnrolmentsDAO() {
        return new MdlMnetserviceEnrolEnrolmentsMySqlExtDAO();
    }

    /**
     * @return MdlModules
     */
    public static function getMdlModulesDAO() {
        return new MdlModulesMySqlExtDAO();
    }

    /**
     * @return MdlMyPages
     */
    public static function getMdlMyPagesDAO() {
        return new MdlMyPagesMySqlExtDAO();
    }

    /**
     * @return MdlPage
     */
    public static function getMdlPageDAO() {
        return new MdlPageMySqlExtDAO();
    }

    /**
     * @return MdlPortfolioInstance
     */
    public static function getMdlPortfolioInstanceDAO() {
        return new MdlPortfolioInstanceMySqlExtDAO();
    }

    /**
     * @return MdlPortfolioInstanceConfig
     */
    public static function getMdlPortfolioInstanceConfigDAO() {
        return new MdlPortfolioInstanceConfigMySqlExtDAO();
    }

    /**
     * @return MdlPortfolioInstanceUser
     */
    public static function getMdlPortfolioInstanceUserDAO() {
        return new MdlPortfolioInstanceUserMySqlExtDAO();
    }

    /**
     * @return MdlPortfolioLog
     */
    public static function getMdlPortfolioLogDAO() {
        return new MdlPortfolioLogMySqlExtDAO();
    }

    /**
     * @return MdlPortfolioMaharaQueue
     */
    public static function getMdlPortfolioMaharaQueueDAO() {
        return new MdlPortfolioMaharaQueueMySqlExtDAO();
    }

    /**
     * @return MdlPortfolioTempdata
     */
    public static function getMdlPortfolioTempdataDAO() {
        return new MdlPortfolioTempdataMySqlExtDAO();
    }

    /**
     * @return MdlPost
     */
    public static function getMdlPostDAO() {
        return new MdlPostMySqlExtDAO();
    }

    /**
     * @return MdlProfiling
     */
    public static function getMdlProfilingDAO() {
        return new MdlProfilingMySqlExtDAO();
    }

    /**
     * @return MdlQtypeEssayOptions
     */
    public static function getMdlQtypeEssayOptionsDAO() {
        return new MdlQtypeEssayOptionsMySqlExtDAO();
    }

    /**
     * @return MdlQtypeMatchOptions
     */
    public static function getMdlQtypeMatchOptionsDAO() {
        return new MdlQtypeMatchOptionsMySqlExtDAO();
    }

    /**
     * @return MdlQtypeMatchSubquestions
     */
    public static function getMdlQtypeMatchSubquestionsDAO() {
        return new MdlQtypeMatchSubquestionsMySqlExtDAO();
    }

    /**
     * @return MdlQtypeMultichoiceOptions
     */
    public static function getMdlQtypeMultichoiceOptionsDAO() {
        return new MdlQtypeMultichoiceOptionsMySqlExtDAO();
    }

    /**
     * @return MdlQtypeRandomsamatchOptions
     */
    public static function getMdlQtypeRandomsamatchOptionsDAO() {
        return new MdlQtypeRandomsamatchOptionsMySqlExtDAO();
    }

    /**
     * @return MdlQtypeShortanswerOptions
     */
    public static function getMdlQtypeShortanswerOptionsDAO() {
        return new MdlQtypeShortanswerOptionsMySqlExtDAO();
    }

    /**
     * @return MdlQuestion
     */
    public static function getMdlQuestionDAO() {
        return new MdlQuestionMySqlExtDAO();
    }

    /**
     * @return MdlQuestionAnswers
     */
    public static function getMdlQuestionAnswersDAO() {
        return new MdlQuestionAnswersMySqlExtDAO();
    }

    /**
     * @return MdlQuestionAttemptStepData
     */
    public static function getMdlQuestionAttemptStepDataDAO() {
        return new MdlQuestionAttemptStepDataMySqlExtDAO();
    }

    /**
     * @return MdlQuestionAttemptSteps
     */
    public static function getMdlQuestionAttemptStepsDAO() {
        return new MdlQuestionAttemptStepsMySqlExtDAO();
    }

    /**
     * @return MdlQuestionAttempts
     */
    public static function getMdlQuestionAttemptsDAO() {
        return new MdlQuestionAttemptsMySqlExtDAO();
    }

    /**
     * @return MdlQuestionCalculated
     */
    public static function getMdlQuestionCalculatedDAO() {
        return new MdlQuestionCalculatedMySqlExtDAO();
    }

    /**
     * @return MdlQuestionCalculatedOptions
     */
    public static function getMdlQuestionCalculatedOptionsDAO() {
        return new MdlQuestionCalculatedOptionsMySqlExtDAO();
    }

    /**
     * @return MdlQuestionCategories
     */
    public static function getMdlQuestionCategoriesDAO() {
        return new MdlQuestionCategoriesMySqlExtDAO();
    }

    /**
     * @return MdlQuestionDatasetDefinitions
     */
    public static function getMdlQuestionDatasetDefinitionsDAO() {
        return new MdlQuestionDatasetDefinitionsMySqlExtDAO();
    }

    /**
     * @return MdlQuestionDatasetItems
     */
    public static function getMdlQuestionDatasetItemsDAO() {
        return new MdlQuestionDatasetItemsMySqlExtDAO();
    }

    /**
     * @return MdlQuestionDatasets
     */
    public static function getMdlQuestionDatasetsDAO() {
        return new MdlQuestionDatasetsMySqlExtDAO();
    }

    /**
     * @return MdlQuestionHints
     */
    public static function getMdlQuestionHintsDAO() {
        return new MdlQuestionHintsMySqlExtDAO();
    }

    /**
     * @return MdlQuestionMultianswer
     */
    public static function getMdlQuestionMultianswerDAO() {
        return new MdlQuestionMultianswerMySqlExtDAO();
    }

    /**
     * @return MdlQuestionNumerical
     */
    public static function getMdlQuestionNumericalDAO() {
        return new MdlQuestionNumericalMySqlExtDAO();
    }

    /**
     * @return MdlQuestionNumericalOptions
     */
    public static function getMdlQuestionNumericalOptionsDAO() {
        return new MdlQuestionNumericalOptionsMySqlExtDAO();
    }

    /**
     * @return MdlQuestionNumericalUnits
     */
    public static function getMdlQuestionNumericalUnitsDAO() {
        return new MdlQuestionNumericalUnitsMySqlExtDAO();
    }

    /**
     * @return MdlQuestionResponseAnalysis
     */
    public static function getMdlQuestionResponseAnalysisDAO() {
        return new MdlQuestionResponseAnalysisMySqlExtDAO();
    }

    /**
     * @return MdlQuestionSessions
     */
    public static function getMdlQuestionSessionsDAO() {
        return new MdlQuestionSessionsMySqlExtDAO();
    }

    /**
     * @return MdlQuestionStates
     */
    public static function getMdlQuestionStatesDAO() {
        return new MdlQuestionStatesMySqlExtDAO();
    }

    /**
     * @return MdlQuestionStatistics
     */
    public static function getMdlQuestionStatisticsDAO() {
        return new MdlQuestionStatisticsMySqlExtDAO();
    }

    /**
     * @return MdlQuestionTruefalse
     */
    public static function getMdlQuestionTruefalseDAO() {
        return new MdlQuestionTruefalseMySqlExtDAO();
    }

    /**
     * @return MdlQuestionUsages
     */
    public static function getMdlQuestionUsagesDAO() {
        return new MdlQuestionUsagesMySqlExtDAO();
    }

    /**
     * @return MdlQuiz
     */
    public static function getMdlQuizDAO() {
        return new MdlQuizMySqlExtDAO();
    }

    /**
     * @return MdlQuizAttempts
     */
    public static function getMdlQuizAttemptsDAO() {
        return new MdlQuizAttemptsMySqlExtDAO();
    }

    /**
     * @return MdlQuizFeedback
     */
    public static function getMdlQuizFeedbackDAO() {
        return new MdlQuizFeedbackMySqlExtDAO();
    }

    /**
     * @return MdlQuizGrades
     */
    public static function getMdlQuizGradesDAO() {
        return new MdlQuizGradesMySqlExtDAO();
    }

    /**
     * @return MdlQuizOverrides
     */
    public static function getMdlQuizOverridesDAO() {
        return new MdlQuizOverridesMySqlExtDAO();
    }

    /**
     * @return MdlQuizOverviewRegrades
     */
    public static function getMdlQuizOverviewRegradesDAO() {
        return new MdlQuizOverviewRegradesMySqlExtDAO();
    }

    /**
     * @return MdlQuizQuestionInstances
     */
    public static function getMdlQuizQuestionInstancesDAO() {
        return new MdlQuizQuestionInstancesMySqlExtDAO();
    }

    /**
     * @return MdlQuizReports
     */
    public static function getMdlQuizReportsDAO() {
        return new MdlQuizReportsMySqlExtDAO();
    }

    /**
     * @return MdlQuizStatistics
     */
    public static function getMdlQuizStatisticsDAO() {
        return new MdlQuizStatisticsMySqlExtDAO();
    }

    /**
     * @return MdlRating
     */
    public static function getMdlRatingDAO() {
        return new MdlRatingMySqlExtDAO();
    }

    /**
     * @return MdlRegistrationHubs
     */
    public static function getMdlRegistrationHubsDAO() {
        return new MdlRegistrationHubsMySqlExtDAO();
    }

    /**
     * @return MdlRepository
     */
    public static function getMdlRepositoryDAO() {
        return new MdlRepositoryMySqlExtDAO();
    }

    /**
     * @return MdlRepositoryInstanceConfig
     */
    public static function getMdlRepositoryInstanceConfigDAO() {
        return new MdlRepositoryInstanceConfigMySqlExtDAO();
    }

    /**
     * @return MdlRepositoryInstances
     */
    public static function getMdlRepositoryInstancesDAO() {
        return new MdlRepositoryInstancesMySqlExtDAO();
    }

    /**
     * @return MdlResource
     */
    public static function getMdlResourceDAO() {
        return new MdlResourceMySqlExtDAO();
    }

    /**
     * @return MdlResourceOld
     */
    public static function getMdlResourceOldDAO() {
        return new MdlResourceOldMySqlExtDAO();
    }

    /**
     * @return MdlRole
     */
    public static function getMdlRoleDAO() {
        return new MdlRoleMySqlExtDAO();
    }

    /**
     * @return MdlRoleAllowAssign
     */
    public static function getMdlRoleAllowAssignDAO() {
        return new MdlRoleAllowAssignMySqlExtDAO();
    }

    /**
     * @return MdlRoleAllowOverride
     */
    public static function getMdlRoleAllowOverrideDAO() {
        return new MdlRoleAllowOverrideMySqlExtDAO();
    }

    /**
     * @return MdlRoleAllowSwitch
     */
    public static function getMdlRoleAllowSwitchDAO() {
        return new MdlRoleAllowSwitchMySqlExtDAO();
    }

    /**
     * @return MdlRoleAssignments
     */
    public static function getMdlRoleAssignmentsDAO() {
        return new MdlRoleAssignmentsMySqlExtDAO();
    }

    /**
     * @return MdlRoleCapabilities
     */
    public static function getMdlRoleCapabilitiesDAO() {
        return new MdlRoleCapabilitiesMySqlExtDAO();
    }

    /**
     * @return MdlRoleContextLevels
     */
    public static function getMdlRoleContextLevelsDAO() {
        return new MdlRoleContextLevelsMySqlExtDAO();
    }

    /**
     * @return MdlRoleNames
     */
    public static function getMdlRoleNamesDAO() {
        return new MdlRoleNamesMySqlExtDAO();
    }

    /**
     * @return MdlRoleSortorder
     */
    public static function getMdlRoleSortorderDAO() {
        return new MdlRoleSortorderMySqlExtDAO();
    }

    /**
     * @return MdlScale
     */
    public static function getMdlScaleDAO() {
        return new MdlScaleMySqlExtDAO();
    }

    /**
     * @return MdlScaleHistory
     */
    public static function getMdlScaleHistoryDAO() {
        return new MdlScaleHistoryMySqlExtDAO();
    }

    /**
     * @return MdlScorm
     */
    public static function getMdlScormDAO() {
        return new MdlScormMySqlExtDAO();
    }

    /**
     * @return MdlScormAiccSession
     */
    public static function getMdlScormAiccSessionDAO() {
        return new MdlScormAiccSessionMySqlExtDAO();
    }

    /**
     * @return MdlScormScoes
     */
    public static function getMdlScormScoesDAO() {
        return new MdlScormScoesMySqlExtDAO();
    }

    /**
     * @return MdlScormScoesData
     */
    public static function getMdlScormScoesDataDAO() {
        return new MdlScormScoesDataMySqlExtDAO();
    }

    /**
     * @return MdlScormScoesTrack
     */
    public static function getMdlScormScoesTrackDAO() {
        return new MdlScormScoesTrackMySqlExtDAO();
    }

    /**
     * @return MdlScormSeqMapinfo
     */
    public static function getMdlScormSeqMapinfoDAO() {
        return new MdlScormSeqMapinfoMySqlExtDAO();
    }

    /**
     * @return MdlScormSeqObjective
     */
    public static function getMdlScormSeqObjectiveDAO() {
        return new MdlScormSeqObjectiveMySqlExtDAO();
    }

    /**
     * @return MdlScormSeqRolluprule
     */
    public static function getMdlScormSeqRollupruleDAO() {
        return new MdlScormSeqRollupruleMySqlExtDAO();
    }

    /**
     * @return MdlScormSeqRolluprulecond
     */
    public static function getMdlScormSeqRolluprulecondDAO() {
        return new MdlScormSeqRolluprulecondMySqlExtDAO();
    }

    /**
     * @return MdlScormSeqRulecond
     */
    public static function getMdlScormSeqRulecondDAO() {
        return new MdlScormSeqRulecondMySqlExtDAO();
    }

    /**
     * @return MdlScormSeqRuleconds
     */
    public static function getMdlScormSeqRulecondsDAO() {
        return new MdlScormSeqRulecondsMySqlExtDAO();
    }

    /**
     * @return MdlSessions
     */
    public static function getMdlSessionsDAO() {
        return new MdlSessionsMySqlExtDAO();
    }

    /**
     * @return MdlStatsDaily
     */
    public static function getMdlStatsDailyDAO() {
        return new MdlStatsDailyMySqlExtDAO();
    }

    /**
     * @return MdlStatsMonthly
     */
    public static function getMdlStatsMonthlyDAO() {
        return new MdlStatsMonthlyMySqlExtDAO();
    }

    /**
     * @return MdlStatsUserDaily
     */
    public static function getMdlStatsUserDailyDAO() {
        return new MdlStatsUserDailyMySqlExtDAO();
    }

    /**
     * @return MdlStatsUserMonthly
     */
    public static function getMdlStatsUserMonthlyDAO() {
        return new MdlStatsUserMonthlyMySqlExtDAO();
    }

    /**
     * @return MdlStatsUserWeekly
     */
    public static function getMdlStatsUserWeeklyDAO() {
        return new MdlStatsUserWeeklyMySqlExtDAO();
    }

    /**
     * @return MdlStatsWeekly
     */
    public static function getMdlStatsWeeklyDAO() {
        return new MdlStatsWeeklyMySqlExtDAO();
    }

    /**
     * @return MdlSurvey
     */
    public static function getMdlSurveyDAO() {
        return new MdlSurveyMySqlExtDAO();
    }

    /**
     * @return MdlSurveyAnalysis
     */
    public static function getMdlSurveyAnalysisDAO() {
        return new MdlSurveyAnalysisMySqlExtDAO();
    }

    /**
     * @return MdlSurveyAnswers
     */
    public static function getMdlSurveyAnswersDAO() {
        return new MdlSurveyAnswersMySqlExtDAO();
    }

    /**
     * @return MdlSurveyQuestions
     */
    public static function getMdlSurveyQuestionsDAO() {
        return new MdlSurveyQuestionsMySqlExtDAO();
    }

    /**
     * @return MdlTag
     */
    public static function getMdlTagDAO() {
        return new MdlTagMySqlExtDAO();
    }

    /**
     * @return MdlTagCorrelation
     */
    public static function getMdlTagCorrelationDAO() {
        return new MdlTagCorrelationMySqlExtDAO();
    }

    /**
     * @return MdlTagInstance
     */
    public static function getMdlTagInstanceDAO() {
        return new MdlTagInstanceMySqlExtDAO();
    }

    /**
     * @return MdlTimezone
     */
    public static function getMdlTimezoneDAO() {
        return new MdlTimezoneMySqlExtDAO();
    }

    /**
     * @return MdlToolCustomlang
     */
    public static function getMdlToolCustomlangDAO() {
        return new MdlToolCustomlangMySqlExtDAO();
    }

    /**
     * @return MdlToolCustomlangComponents
     */
    public static function getMdlToolCustomlangComponentsDAO() {
        return new MdlToolCustomlangComponentsMySqlExtDAO();
    }

    /**
     * @return MdlUpgradeLog
     */
    public static function getMdlUpgradeLogDAO() {
        return new MdlUpgradeLogMySqlExtDAO();
    }

    /**
     * @return MdlUrl
     */
    public static function getMdlUrlDAO() {
        return new MdlUrlMySqlExtDAO();
    }

    /**
     * @return MdlUser
     */
    public static function getMdlUserDAO() {
        return new MdlUserMySqlExtDAO();
    }

    /**
     * @return MdlUserDevices
     */
    public static function getMdlUserDevicesDAO() {
        return new MdlUserDevicesMySqlExtDAO();
    }

    /**
     * @return MdlUserEnrolments
     */
    public static function getMdlUserEnrolmentsDAO() {
        return new MdlUserEnrolmentsMySqlExtDAO();
    }

    /**
     * @return MdlUserInfoCategory
     */
    public static function getMdlUserInfoCategoryDAO() {
        return new MdlUserInfoCategoryMySqlExtDAO();
    }

    /**
     * @return MdlUserInfoData
     */
    public static function getMdlUserInfoDataDAO() {
        return new MdlUserInfoDataMySqlExtDAO();
    }

    /**
     * @return MdlUserInfoField
     */
    public static function getMdlUserInfoFieldDAO() {
        return new MdlUserInfoFieldMySqlExtDAO();
    }

    /**
     * @return MdlUserLastaccess
     */
    public static function getMdlUserLastaccessDAO() {
        return new MdlUserLastaccessMySqlExtDAO();
    }

    /**
     * @return MdlUserPasswordResets
     */
    public static function getMdlUserPasswordResetsDAO() {
        return new MdlUserPasswordResetsMySqlExtDAO();
    }

    /**
     * @return MdlUserPreferences
     */
    public static function getMdlUserPreferencesDAO() {
        return new MdlUserPreferencesMySqlExtDAO();
    }

    /**
     * @return MdlUserPrivateKey
     */
    public static function getMdlUserPrivateKeyDAO() {
        return new MdlUserPrivateKeyMySqlExtDAO();
    }

    /**
     * @return MdlWebdavLocks
     */
    public static function getMdlWebdavLocksDAO() {
        return new MdlWebdavLocksMySqlExtDAO();
    }

    /**
     * @return MdlWiki
     */
    public static function getMdlWikiDAO() {
        return new MdlWikiMySqlExtDAO();
    }

    /**
     * @return MdlWikiLinks
     */
    public static function getMdlWikiLinksDAO() {
        return new MdlWikiLinksMySqlExtDAO();
    }

    /**
     * @return MdlWikiLocks
     */
    public static function getMdlWikiLocksDAO() {
        return new MdlWikiLocksMySqlExtDAO();
    }

    /**
     * @return MdlWikiPages
     */
    public static function getMdlWikiPagesDAO() {
        return new MdlWikiPagesMySqlExtDAO();
    }

    /**
     * @return MdlWikiSubwikis
     */
    public static function getMdlWikiSubwikisDAO() {
        return new MdlWikiSubwikisMySqlExtDAO();
    }

    /**
     * @return MdlWikiSynonyms
     */
    public static function getMdlWikiSynonymsDAO() {
        return new MdlWikiSynonymsMySqlExtDAO();
    }

    /**
     * @return MdlWikiVersions
     */
    public static function getMdlWikiVersionsDAO() {
        return new MdlWikiVersionsMySqlExtDAO();
    }

    /**
     * @return MdlWorkshop
     */
    public static function getMdlWorkshopDAO() {
        return new MdlWorkshopMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopAggregations
     */
    public static function getMdlWorkshopAggregationsDAO() {
        return new MdlWorkshopAggregationsMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopAssessments
     */
    public static function getMdlWorkshopAssessmentsDAO() {
        return new MdlWorkshopAssessmentsMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopAssessmentsOld
     */
    public static function getMdlWorkshopAssessmentsOldDAO() {
        return new MdlWorkshopAssessmentsOldMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopCommentsOld
     */
    public static function getMdlWorkshopCommentsOldDAO() {
        return new MdlWorkshopCommentsOldMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopElementsOld
     */
    public static function getMdlWorkshopElementsOldDAO() {
        return new MdlWorkshopElementsOldMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopGrades
     */
    public static function getMdlWorkshopGradesDAO() {
        return new MdlWorkshopGradesMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopGradesOld
     */
    public static function getMdlWorkshopGradesOldDAO() {
        return new MdlWorkshopGradesOldMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopOld
     */
    public static function getMdlWorkshopOldDAO() {
        return new MdlWorkshopOldMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopRubricsOld
     */
    public static function getMdlWorkshopRubricsOldDAO() {
        return new MdlWorkshopRubricsOldMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopStockcommentsOld
     */
    public static function getMdlWorkshopStockcommentsOldDAO() {
        return new MdlWorkshopStockcommentsOldMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopSubmissions
     */
    public static function getMdlWorkshopSubmissionsDAO() {
        return new MdlWorkshopSubmissionsMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopSubmissionsOld
     */
    public static function getMdlWorkshopSubmissionsOldDAO() {
        return new MdlWorkshopSubmissionsOldMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopallocationScheduled
     */
    public static function getMdlWorkshopallocationScheduledDAO() {
        return new MdlWorkshopallocationScheduledMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopevalBestSettings
     */
    public static function getMdlWorkshopevalBestSettingsDAO() {
        return new MdlWorkshopevalBestSettingsMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopformAccumulative
     */
    public static function getMdlWorkshopformAccumulativeDAO() {
        return new MdlWorkshopformAccumulativeMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopformComments
     */
    public static function getMdlWorkshopformCommentsDAO() {
        return new MdlWorkshopformCommentsMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopformNumerrors
     */
    public static function getMdlWorkshopformNumerrorsDAO() {
        return new MdlWorkshopformNumerrorsMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopformNumerrorsMap
     */
    public static function getMdlWorkshopformNumerrorsMapDAO() {
        return new MdlWorkshopformNumerrorsMapMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopformRubric
     */
    public static function getMdlWorkshopformRubricDAO() {
        return new MdlWorkshopformRubricMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopformRubricConfig
     */
    public static function getMdlWorkshopformRubricConfigDAO() {
        return new MdlWorkshopformRubricConfigMySqlExtDAO();
    }

    /**
     * @return MdlWorkshopformRubricLevels
     */
    public static function getMdlWorkshopformRubricLevelsDAO() {
        return new MdlWorkshopformRubricLevelsMySqlExtDAO();
    }

    /**
     * @return Message
     */
    public static function getMessageDAO() {
        return new MessageMySqlExtDAO();
    }

    /**
     * @return News
     */
    public static function getNewsDAO() {
        return new NewsMySqlExtDAO();
    }

    /**
     * @return Notification
     */
    public static function getNotificationDAO() {
        return new NotificationMySqlExtDAO();
    }

    /**
     * @return Noticias
     */
    public static function getNoticiasDAO() {
        return new noticiasMySqlExtDAO();
    }

    /**
     * @return Payment
     */
    public static function getPaymentDAO() {
        return new PaymentMySqlExtDAO();
    }

    /**
     * @return Position
     */
    public static function getPositionDAO() {
        return new PositionMySqlExtDAO();
    }

    /**
     * @return Postulategame
     */
    public static function getPostulategameDAO() {
        return new PostulategameMySqlExtDAO();
    }

    /**
     * @return Privilegios
     */
    public static function getPrivilegiosDAO() {
        return new PrivilegiosMySqlExtDAO();
    }

    /**
     * @return Qualification
     */
    public static function getQualificationDAO() {
        return new QualificationMySqlExtDAO();
    }

    /**
     * @return Rating
     */
    public static function getRatingDAO() {
        return new RatingMySqlExtDAO();
    }

    /**
     * @return Reserve
     */
    public static function getReserveDAO() {
        return new ReserveMySqlExtDAO();
    }

    /**
     * @return Role
     */
    public static function getRoleDAO() {
        return new RoleMySqlExtDAO();
    }

    /**
     * @return Schedule
     */
    public static function getScheduleDAO() {
        return new ScheduleMySqlExtDAO();
    }

    /**
     * @return Statistics
     */
    public static function getStatisticsDAO() {
        return new StatisticsMySqlExtDAO();
    }

    /**
     * @return SubComplex
     */
    public static function getSubComplexDAO() {
        return new SubComplexMySqlExtDAO();
    }

    /**
     * @return Tariff
     */
    public static function getTariffDAO() {
        return new TariffMySqlExtDAO();
    }

    /**
     * @return Team
     */
    public static function getTeamDAO() {
        return new TeamMySqlExtDAO();
    }

    /**
     * @return TeamHasAttachment
     */
    public static function getTeamHasAttachmentDAO() {
        return new TeamHasAttachmentMySqlExtDAO();
    }

    /**
     * @return TeamHasVirtues
     */
    public static function getTeamHasVirtuesDAO() {
        return new TeamHasVirtuesMySqlExtDAO();
    }

    /**
     * @return Tournament
     */
    public static function getTournamentDAO() {
        return new TournamentMySqlExtDAO();
    }

    /**
     * @return TournamentHasAttachment
     */
    public static function getTournamentHasAttachmentDAO() {
        return new TournamentHasAttachmentMySqlExtDAO();
    }

    /**
     * @return TournamentHasTeam
     */
    public static function getTournamentHasTeamDAO() {
        return new TournamentHasTeamMySqlExtDAO();
    }

    /**
     * @return Transaction
     */
    public static function getTransactionDAO() {
        return new TransactionMySqlExtDAO();
    }

    /**
     * @return Type
     */
    public static function getTypeDAO() {
        return new TypeMySqlExtDAO();
    }

    /**
     * @return TypeStatistic
     */
    public static function getTypeStatisticDAO() {
        return new TypeStatisticMySqlExtDAO();
    }

    /**
     * @return Typenotifications
     */
    public static function getTypenotificationsDAO() {
        return new TypenotificationsMySqlExtDAO();
    }

    /**
     * @return UserHasAttachment
     */
    public static function getUserHasAttachmentDAO() {
        return new UserHasAttachmentMySqlExtDAO();
    }

    /**
     * @return UserHasExperience
     */
    public static function getUserHasExperienceDAO() {
        return new UserHasExperienceMySqlExtDAO();
    }

    /**
     * @return UserHasPosition
     */
    public static function getUserHasPositionDAO() {
        return new UserHasPositionMySqlExtDAO();
    }

    /**
     * @return UserHasTeam
     */
    public static function getUserHasTeamDAO() {
        return new UserHasTeamMySqlExtDAO();
    }

    /**
     * @return UserHasVirtues
     */
    public static function getUserHasVirtuesDAO() {
        return new UserHasVirtuesMySqlExtDAO();
    }

    /**
     * @return Users
     */
    public static function getUsersDAO() {
        return new UsersMySqlExtDAO();
    }

    /**
     * @return UsersHasTypenotifications
     */
    public static function getUsersHasTypenotificationsDAO() {
        return new UsersHasTypenotificationsMySqlExtDAO();
    }

    /**
     * @return Virtues
     */
    public static function getVirtuesDAO() {
        return new VirtuesMySqlExtDAO();
    }

    /**
     * @return VirtuesGroup
     */
    public static function getVirtuesGroupDAO() {
        return new VirtuesGroupMySqlExtDAO();
    }

    /**
     * @return VwTeamDrawLocal
     */
    public static function getVwTeamDrawLocalDAO() {
        return new VwTeamDrawLocalMySqlExtDAO();
    }

    /**
     * @return VwTeamDrawVisitant
     */
    public static function getVwTeamDrawVisitantDAO() {
        return new VwTeamDrawVisitantMySqlExtDAO();
    }

    /**
     * @return VwTeamLostLocal
     */
    public static function getVwTeamLostLocalDAO() {
        return new VwTeamLostLocalMySqlExtDAO();
    }

    /**
     * @return VwTeamLostVisitant
     */
    public static function getVwTeamLostVisitantDAO() {
        return new VwTeamLostVisitantMySqlExtDAO();
    }

    /**
     * @return VwTeamWinLocal
     */
    public static function getVwTeamWinLocalDAO() {
        return new VwTeamWinLocalMySqlExtDAO();
    }

    /**
     * @return VwTeamWinVisitant
     */
    public static function getVwTeamWinVisitantDAO() {
        return new VwTeamWinVisitantMySqlExtDAO();
    }

    /**
     * @return VwTypeStatisticTeams
     */
    public static function getVwTypeStatisticTeamsDAO() {
        return new VwTypeStatisticTeamsMySqlExtDAO();
    }

    /**
     * @return VwTypeStatisticUser
     */
    public static function getVwTypeStatisticUserDAO() {
        return new VwTypeStatisticUserMySqlExtDAO();
    }

}

?>