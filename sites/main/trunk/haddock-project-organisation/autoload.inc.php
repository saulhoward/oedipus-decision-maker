<?php
/**
 * __autoload .INC file
 *
 * Last Modified: 2008-10-29
 */

function __autoload($class_name)
{
	switch ($class_name) {
	
		case('Admin_AddUserCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/cli-scripts/Admin_AddUserCLIScript.inc.php';
			break;

		case('Admin_AdminIncluderURLFactory'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/Admin_AdminIncluderURLFactory.inc.php';
			break;

		case('Admin_ConfigManager'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/Admin_ConfigManager.inc.php';
			break;

		case('Admin_DeleteAllUsersCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/cli-scripts/Admin_DeleteAllUsersCLIScript.inc.php';
			break;

		case('Admin_DeleteUserCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/cli-scripts/Admin_DeleteUserCLIScript.inc.php';
			break;

		case('Admin_EditUserCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/cli-scripts/Admin_EditUserCLIScript.inc.php';
			break;

		case('Admin_HTMLPage'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/pages/Admin_HTMLPage.inc.php';
			break;

		case('Admin_IncFileFinder'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/Admin_IncFileFinder.inc.php';
			break;

		case('Admin_IncludesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/Admin_IncludesDirectory.inc.php';
			break;

		case('Admin_ListUsersCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/cli-scripts/Admin_ListUsersCLIScript.inc.php';
			break;

		case('Admin_LogInHelper'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/helpers/Admin_LogInHelper.inc.php';
			break;

		case('Admin_LoginManager'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/Admin_LoginManager.inc.php';
			break;

		case('Admin_ModuleLinksUL'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/html-tags/Admin_ModuleLinksUL.inc.php';
			break;

		case('Admin_ModuleTitleFile'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/Admin_ModuleTitleFile.inc.php';
			break;

		case('Admin_NavigationLinksFile'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/Admin_NavigationLinksFile.inc.php';
			break;

		case('Admin_NavigationXMLFile'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/Admin_NavigationXMLFile.inc.php';
			break;

		case('Admin_NXFPage'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/Admin_NXFPage.inc.php';
			break;

		case('Admin_PageDirectory'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/Admin_PageDirectory.inc.php';
			break;

		case('Admin_PagesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/Admin_PagesDirectory.inc.php';
			break;

		case('Admin_ResetAllUsersPasswordsCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/cli-scripts/Admin_ResetAllUsersPasswordsCLIScript.inc.php';
			break;

		case('Admin_ResetUserPasswordCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/cli-scripts/Admin_ResetUserPasswordCLIScript.inc.php';
			break;

		case('Admin_RestrictedHTMLPage'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/pages/Admin_RestrictedHTMLPage.inc.php';
			break;

		case('Admin_RestrictedRedirectScript'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/pages/Admin_RestrictedRedirectScript.inc.php';
			break;

		case('Admin_ShowUserCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/cli-scripts/Admin_ShowUserCLIScript.inc.php';
			break;

		case('Admin_SiteMapUL'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/html-tags/Admin_SiteMapUL.inc.php';
			break;

		case('Admin_StartPage'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/pages/Admin_StartPage.inc.php';
			break;

		case('Admin_StartPageWidget'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/Admin_StartPageWidget.inc.php';
			break;

		case('Admin_UserEntry'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/persistence/entries/Admin_UserEntry.inc.php';
			break;

		case('Admin_UserRow'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/database/elements/row-subclasses/Admin_UserRow.inc.php';
			break;

		case('Admin_UserRowRenderer'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/database/renderers/row-renderers/Admin_UserRowRenderer.inc.php';
			break;

		case('Admin_UsersHelper'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/helpers/Admin_UsersHelper.inc.php';
			break;

		case('Admin_UsersTable'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/database/elements/table-subclasses/Admin_UsersTable.inc.php';
			break;

		case('Admin_UsersTableRenderer'): 
			require_once PROJECT_ROOT . '/haddock/admin/classes/database/renderers/table-renderers/Admin_UsersTableRenderer.inc.php';
			break;

		case('Caching_CacheDirectoryCreator'): 
			require_once PROJECT_ROOT . '/haddock/caching/classes/Caching_CacheDirectoryCreator.inc.php';
			break;

		case('Caching_CacheManager'): 
			require_once PROJECT_ROOT . '/haddock/caching/classes/Caching_CacheManager.inc.php';
			break;

		case('Caching_GlobalVarManager'): 
			require_once PROJECT_ROOT . '/haddock/caching/classes/Caching_GlobalVarManager.inc.php';
			break;

		case('Caching_SessionVarManager'): 
			require_once PROJECT_ROOT . '/haddock/caching/classes/Caching_SessionVarManager.inc.php';
			break;

		case('CLIScripts_ArgsHelper'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/helpers/CLIScripts_ArgsHelper.inc.php';
			break;

		case('CLIScripts_BatWrapperScript'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/CLIScripts_BatWrapperScript.inc.php';
			break;

		case('CLIScripts_BinIncludesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/CLIScripts_BinIncludesDirectory.inc.php';
			break;

		case('CLIScripts_CLIScript'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/cli-scripts/CLIScripts_CLIScript.inc.php';
			break;

		case('CLIScripts_CLIScriptFilesHelper'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/helpers/CLIScripts_CLIScriptFilesHelper.inc.php';
			break;

		case('CLIScripts_CLIScriptPHPClassFile'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/file-system/files/CLIScripts_CLIScriptPHPClassFile.inc.php';
			break;

		case('CLIScripts_CLIScriptsHelper'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/helpers/CLIScripts_CLIScriptsHelper.inc.php';
			break;

		case('CLIScripts_ConfigManager'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/managers/config/CLIScripts_ConfigManager.inc.php';
			break;

		case('CLIScripts_CreateCLIScriptCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/cli-scripts/CLIScripts_CreateCLIScriptCLIScript.inc.php';
			break;

		case('CLIScripts_DataRenderingHelper'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/helpers/CLIScripts_DataRenderingHelper.inc.php';
			break;

		case('CLIScripts_ExceptionsHelper'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/helpers/CLIScripts_ExceptionsHelper.inc.php';
			break;

		case('CLIScripts_ExecutablePHPFile'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/file-system/files/CLIScripts_ExecutablePHPFile.inc.php';
			break;

		case('CLIScripts_GenerateScriptObjectRunnersCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/cli-scripts/CLIScripts_GenerateScriptObjectRunnersCLIScript.inc.php';
			break;

		case('CLIScripts_InputReader'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/CLIScripts_InputReader.inc.php';
			break;

		case('CLIScripts_InterpreterProgramHelper'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/helpers/CLIScripts_InterpreterProgramHelper.inc.php';
			break;

		case('CLIScripts_LockFile'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/file-system/files/CLIScripts_LockFile.inc.php';
			break;

		case('CLIScripts_LockFilesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/file-system/directories/CLIScripts_LockFilesDirectory.inc.php';
			break;

		case('CLIScripts_LockFilesHelper'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/helpers/CLIScripts_LockFilesHelper.inc.php';
			break;

		case('CLIScripts_NewScriptNameValidator'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/input-validation/CLIScripts_NewScriptNameValidator.inc.php';
			break;

		case('CLIScripts_ScriptDirectory'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/CLIScripts_ScriptDirectory.inc.php';
			break;

		case('CLIScripts_ScriptLockedException'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/exceptions/CLIScripts_ScriptLockedException.inc.php';
			break;

		case('CLIScripts_ScriptObjectRunnerFile'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/file-system/files/CLIScripts_ScriptObjectRunnerFile.inc.php';
			break;

		case('CLIScripts_ScriptObjectRunnersDirectory'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/file-system/directories/CLIScripts_ScriptObjectRunnersDirectory.inc.php';
			break;

		case('CLIScripts_ScriptObjectRunnersDirectoryTests'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/unit-tests/CLIScripts_ScriptObjectRunnersDirectoryTests.inc.php';
			break;

		case('CLIScripts_ScriptObjectRunnersHelper'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/helpers/CLIScripts_ScriptObjectRunnersHelper.inc.php';
			break;

		case('CLIScripts_ScriptsDirectory'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/CLIScripts_ScriptsDirectory.inc.php';
			break;

		case('CLIScripts_ShowServerCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/cli-scripts/CLIScripts_ShowServerCLIScript.inc.php';
			break;

		case('CLIScripts_SHWrapperScript'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/CLIScripts_SHWrapperScript.inc.php';
			break;

		case('CLIScripts_UserInterrogationHelper'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/helpers/CLIScripts_UserInterrogationHelper.inc.php';
			break;

		case('CLIScripts_WrapperScript'): 
			require_once PROJECT_ROOT . '/haddock/cli-scripts/classes/CLIScripts_WrapperScript.inc.php';
			break;

		case('CodeAnalysis_ExecutionTimer'): 
			require_once PROJECT_ROOT . '/haddock/code-analysis/classes/CodeAnalysis_ExecutionTimer.inc.php';
			break;

		case('CodeAnalysis_ListClassesCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/code-analysis/classes/cli-scripts/CodeAnalysis_ListClassesCLIScript.inc.php';
			break;

		case('CodeAnalysis_MemoryHelper'): 
			require_once PROJECT_ROOT . '/haddock/code-analysis/classes/helpers/CodeAnalysis_MemoryHelper.inc.php';
			break;

		case('Configuration_ConfigDirectoriesHelper'): 
			require_once PROJECT_ROOT . '/haddock/configuration/classes/helpers/Configuration_ConfigDirectoriesHelper.inc.php';
			break;

		case('Configuration_ConfigDirectory'): 
			require_once PROJECT_ROOT . '/haddock/configuration/classes/file-system/directories/Configuration_ConfigDirectory.inc.php';
			break;

		case('Configuration_ConfigFile'): 
			require_once PROJECT_ROOT . '/haddock/configuration/classes/file-system/files/Configuration_ConfigFile.inc.php';
			break;

		case('Configuration_ConfigFileNotFoundException'): 
			require_once PROJECT_ROOT . '/haddock/configuration/classes/exceptions/Configuration_ConfigFileNotFoundException.inc.php';
			break;

		case('Configuration_ConfigFilesHelper'): 
			require_once PROJECT_ROOT . '/haddock/configuration/classes/helpers/Configuration_ConfigFilesHelper.inc.php';
			break;

		case('Configuration_ConfigManager'): 
			require_once PROJECT_ROOT . '/haddock/configuration/classes/managers/config/Configuration_ConfigManager.inc.php';
			break;

		case('Configuration_ConfigManagerHelper'): 
			require_once PROJECT_ROOT . '/haddock/configuration/classes/helpers/Configuration_ConfigManagerHelper.inc.php';
			break;

		case('Configuration_InstanceSpecificConfigDirectory'): 
			require_once PROJECT_ROOT . '/haddock/configuration/classes/file-system/directories/Configuration_InstanceSpecificConfigDirectory.inc.php';
			break;

		case('Configuration_InstanceSpecificConfigDirectoryTests'): 
			require_once PROJECT_ROOT . '/haddock/configuration/classes/unit-tests/Configuration_InstanceSpecificConfigDirectoryTests.inc.php';
			break;

		case('Configuration_InstanceSpecificConfigFileNotFoundException'): 
			require_once PROJECT_ROOT . '/haddock/configuration/classes/exceptions/Configuration_InstanceSpecificConfigFileNotFoundException.inc.php';
			break;

		case('Configuration_ListAllConfigFilesCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/configuration/classes/cli-scripts/Configuration_ListAllConfigFilesCLIScript.inc.php';
			break;

		case('Database_AddConditionsToWhereClauseBehaviour'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/behaviours/Database_AddConditionsToWhereClauseBehaviour.inc.php';
			break;

		case('Database_AddKeyValuePairsToSetClauseBehaviour'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/behaviours/Database_AddKeyValuePairsToSetClauseBehaviour.inc.php';
			break;

		case('Database_AddRowOLForm'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/html-tags/Database_AddRowOLForm.inc.php';
			break;

		case('Database_AdminXMLPageManager'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_AdminXMLPageManager.inc.php';
			break;

		case('Database_ApplyUnappliedDeltaFilesCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/cli-scripts/Database_ApplyUnappliedDeltaFilesCLIScript.inc.php';
			break;

		case('Database_BlobField'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/field-subclasses/Database_BlobField.inc.php';
			break;

		case('Database_BlobFieldRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/field-renderers/Database_BlobFieldRenderer.inc.php';
			break;

		case('Database_Cell'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/Database_Cell.inc.php';
			break;

		case('Database_ChoiceField'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/field-subclasses/Database_ChoiceField.inc.php';
			break;

		case('Database_ChoiceFieldRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/field-renderers/Database_ChoiceFieldRenderer.inc.php';
			break;

		case('Database_ConfigManager'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/managers/config/Database_ConfigManager.inc.php';
			break;

		case('Database_ConnectionsHelper'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/helpers/Database_ConnectionsHelper.inc.php';
			break;

		case('Database_CreateDeltaFileCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/cli-scripts/Database_CreateDeltaFileCLIScript.inc.php';
			break;

		case('Database_CreateImageCacheDirectoryCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/cli-scripts/Database_CreateImageCacheDirectoryCLIScript.inc.php';
			break;

		case('Database_CreateMySQLUserAndDatabaseCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/cli-scripts/Database_CreateMySQLUserAndDatabaseCLIScript.inc.php';
			break;

		case('Database_CreatePasswordsFileCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/cli-scripts/Database_CreatePasswordsFileCLIScript.inc.php';
			break;

		case('Database_CRUDAdminManager'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_CRUDAdminManager.inc.php';
			break;

		case('Database_CRUDAdminPage'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/pages/Database_CRUDAdminPage.inc.php';
			break;

		case('Database_CRUDAdminRedirectScript'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/pages/Database_CRUDAdminRedirectScript.inc.php';
			break;

		case('Database_CRUDException'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/exceptions/Database_CRUDException.inc.php';
			break;

		case('Database_Database'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/Database_Database.inc.php';
			break;

		case('Database_DatabaseClassFactory'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_DatabaseClassFactory.inc.php';
			break;

		case('Database_DatabaseClassFactoryTests'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/unit-tests/Database_DatabaseClassFactoryTests.inc.php';
			break;

		case('Database_DatabaseClassFinder'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_DatabaseClassFinder.inc.php';
			break;

		case('Database_DatabaseClassNameFile'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_DatabaseClassNameFile.inc.php';
			break;

		case('Database_DatabaseClassNameFileTests'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/unit-tests/Database_DatabaseClassNameFileTests.inc.php';
			break;

		case('Database_DatabaseClassNameOverride'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_DatabaseClassNameOverride.inc.php';
			break;

		case('Database_DatabaseClassNameOverrideFile'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_DatabaseClassNameOverrideFile.inc.php';
			break;

		case('Database_DatabaseDescribingTests'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/unit-tests/Database_DatabaseDescribingTests.inc.php';
			break;

		case('Database_DatabaseHelper'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/helpers/Database_DatabaseHelper.inc.php';
			break;

		case('Database_DatabaseNameValidator'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/input-validation/Database_DatabaseNameValidator.inc.php';
			break;

		case('Database_DatabaseRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/Database_DatabaseRenderer.inc.php';
			break;

		case('Database_DateTimeField'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/field-subclasses/Database_DateTimeField.inc.php';
			break;

		case('Database_DBHandleTests'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/unit-tests/Database_DBHandleTests.inc.php';
			break;

		case('Database_DBSubClassesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_DBSubClassesDirectory.inc.php';
			break;

		case('Database_DelegateRow'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/row-subclasses/Database_DelegateRow.inc.php';
			break;

		case('Database_DeletableRow'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/delegation/interfaces/row-interfaces/Database_DeletableRow.inc.php';
			break;

		case('Database_DeletableRowDeleteBehaviour'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/delegation/behaviours/row-behaviours/Database_DeletableRowDeleteBehaviour.inc.php';
			break;

		case('Database_DeltaFile'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/file-system/files/Database_DeltaFile.inc.php';
			break;

		case('Database_DeltaFilesHelper'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/helpers/Database_DeltaFilesHelper.inc.php';
			break;

		case('Database_DeltasDirectory'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/file-system/directories/Database_DeltasDirectory.inc.php';
			break;

		case('Database_DeltasTests'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/unit-tests/Database_DeltasTests.inc.php';
			break;

		case('Database_EditRowOLForm'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/html-tags/Database_EditRowOLForm.inc.php';
			break;

		case('Database_Element'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_Element.inc.php';
			break;

		case('Database_ElementTests'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/unit-tests/Database_ElementTests.inc.php';
			break;

		case('Database_EmailAddressVarCharField'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/field-subclasses/Database_EmailAddressVarCharField.inc.php';
			break;

		case('Database_EntityNameValidator'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/input-validation/Database_EntityNameValidator.inc.php';
			break;

		case('Database_Entry'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/persistence/entries/Database_Entry.inc.php';
			break;

		case('Database_EnumField'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/field-subclasses/Database_EnumField.inc.php';
			break;

		case('Database_FetchingHelper'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/helpers/Database_FetchingHelper.inc.php';
			break;

		case('Database_Field'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/Database_Field.inc.php';
			break;

		case('Database_FieldNotInTableException'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/exceptions/Database_FieldNotInTableException.inc.php';
			break;

		case('Database_FieldRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/Database_FieldRenderer.inc.php';
			break;

		case('Database_FilesTableRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/table-renderers/Database_FilesTableRenderer.inc.php';
			break;

		case('Database_ForeignKeyRow'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/row-subclasses/Database_ForeignKeyRow.inc.php';
			break;

		case('Database_ForeignKeyTable'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/table-subclasses/Database_ForeignKeyTable.inc.php';
			break;

		case('Database_GetSetClauseBehaviour'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/behaviours/Database_GetSetClauseBehaviour.inc.php';
			break;

		case('Database_GetWhereClauseBehaviour'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/behaviours/Database_GetWhereClauseBehaviour.inc.php';
			break;

		case('Database_HostNameValidator'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/input-validation/Database_HostNameValidator.inc.php';
			break;

		case('Database_HostNameValidatorTests'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/unit-tests/Database_HostNameValidatorTests.inc.php';
			break;

		case('Database_HTMLPreFieldRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/field-renderers/Database_HTMLPreFieldRenderer.inc.php';
			break;

		case('Database_ImageCacheHelper'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/helpers/Database_ImageCacheHelper.inc.php';
			break;

		case('Database_ImageFieldRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/field-renderers/Database_ImageFieldRenderer.inc.php';
			break;

		case('Database_ImageRow'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/row-subclasses/Database_ImageRow.inc.php';
			break;

		case('Database_ImageRowRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/row-renderers/Database_ImageRowRenderer.inc.php';
			break;

		case('Database_ImagesHelper'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/helpers/Database_ImagesHelper.inc.php';
			break;

		case('Database_ImagesTable'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/table-subclasses/Database_ImagesTable.inc.php';
			break;

		case('Database_ImagesTableRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/table-renderers/Database_ImagesTableRenderer.inc.php';
			break;

		case('Database_InputSanitationHelper'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/helpers/Database_InputSanitationHelper.inc.php';
			break;

		case('Database_IntField'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/field-subclasses/Database_IntField.inc.php';
			break;

		case('Database_InvalidUserInputException'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/exceptions/Database_InvalidUserInputException.inc.php';
			break;

		case('Database_LimitForm'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/html-tags/Database_LimitForm.inc.php';
			break;

		case('Database_ListDeltaFileApplicationsCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/cli-scripts/Database_ListDeltaFileApplicationsCLIScript.inc.php';
			break;

		case('Database_ListDeltaFilesCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/cli-scripts/Database_ListDeltaFilesCLIScript.inc.php';
			break;

		case('Database_ListUnappliedDeltaFilesCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/cli-scripts/Database_ListUnappliedDeltaFilesCLIScript.inc.php';
			break;

		case('Database_LongTextFieldRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/field-renderers/Database_LongTextFieldRenderer.inc.php';
			break;

		case('Database_ManageSimpleCRUDAdminPage'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/pages/crud-pages/simple-crud/Database_ManageSimpleCRUDAdminPage.inc.php';
			break;

		case('Database_ManageSimpleCRUDAdminRedirectScript'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/pages/crud-pages/simple-crud/Database_ManageSimpleCRUDAdminRedirectScript.inc.php';
			break;

		case('Database_ModifyingStatementHelper'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/helpers/Database_ModifyingStatementHelper.inc.php';
			break;

		case('Database_MySQLException'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/exceptions/Database_MySQLException.inc.php';
			break;

		case('Database_MySQLRootUser'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_MySQLRootUser.inc.php';
			break;

		case('Database_MySQLUser'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_MySQLUser.inc.php';
			break;

		case('Database_MySQLUserFactory'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_MySQLUserFactory.inc.php';
			break;

		case('Database_NumericField'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/field-subclasses/Database_NumericField.inc.php';
			break;

		case('Database_PageRow'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/database/elements/row-subclasses/Database_PageRow.inc.php';
			break;

		case('Database_PageRowRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/database/renderers/row-renderers/Database_PageRowRenderer.inc.php';
			break;

		case('Database_PagesTable'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/database/elements/table-subclasses/Database_PagesTable.inc.php';
			break;

		case('Database_PagesTableRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/database/renderers/table-renderers/Database_PagesTableRenderer.inc.php';
			break;

		case('Database_PasswordFile'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_PasswordFile.inc.php';
			break;

		case('Database_PasswordsDirectoryTests'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/unit-tests/Database_PasswordsDirectoryTests.inc.php';
			break;

		case('Database_PasswordsFileHelper'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/helpers/Database_PasswordsFileHelper.inc.php';
			break;

		case('Database_PasswordsFileTests'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/unit-tests/Database_PasswordsFileTests.inc.php';
			break;

		case('Database_PasswordValidator'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/input-validation/Database_PasswordValidator.inc.php';
			break;

		case('Database_PreviousNextUL'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/html-tags/Database_PreviousNextUL.inc.php';
			break;

		case('Database_Renderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_Renderer.inc.php';
			break;

		case('Database_ResetDatabaseCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/cli-scripts/Database_ResetDatabaseCLIScript.inc.php';
			break;

		case('Database_Row'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/Database_Row.inc.php';
			break;

		case('Database_RowBehaviour'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/delegation/behaviours/Database_RowBehaviour.inc.php';
			break;

		case('Database_RowNotFoundException'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/exceptions/Database_RowNotFoundException.inc.php';
			break;

		case('Database_RowOLForm'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/html-tags/Database_RowOLForm.inc.php';
			break;

		case('Database_RowRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/Database_RowRenderer.inc.php';
			break;

		case('Database_SelectionHTMLDiv'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/html-tags/Database_SelectionHTMLDiv.inc.php';
			break;

		case('Database_SelectionManager'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/selection-managers/Database_SelectionManager.inc.php';
			break;

		case('Database_SelectionManagerFactory'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/selection-managers/Database_SelectionManagerFactory.inc.php';
			break;

		case('Database_SelectionManagersFile'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/selection-managers/Database_SelectionManagersFile.inc.php';
			break;

		case('Database_ShortTextFieldRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/field-renderers/Database_ShortTextFieldRenderer.inc.php';
			break;

		case('Database_SimpleCRUDManager'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/pages/crud-pages/simple-crud/Database_SimpleCRUDManager.inc.php';
			break;

		case('Database_SortableHeadingTR'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/html-tags/Database_SortableHeadingTR.inc.php';
			break;

		case('Database_SortableRow'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/delegation/interfaces/row-interfaces/Database_SortableRow.inc.php';
			break;

		case('Database_SortableRowBehaviour'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/delegation/behaviours/row-behaviours/Database_SortableRowBehaviour.inc.php';
			break;

		case('Database_SortableRowMaxSortOrderBehaviour'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/delegation/behaviours/row-behaviours/Database_SortableRowMaxSortOrderBehaviour.inc.php';
			break;

		case('Database_SortableRowMinSortOrderBehaviour'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/delegation/behaviours/row-behaviours/Database_SortableRowMinSortOrderBehaviour.inc.php';
			break;

		case('Database_SortableRowMoveDownBehaviour'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/delegation/behaviours/row-behaviours/Database_SortableRowMoveDownBehaviour.inc.php';
			break;

		case('Database_SortableRowMoveUpBehaviour'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/delegation/behaviours/row-behaviours/Database_SortableRowMoveUpBehaviour.inc.php';
			break;

		case('Database_SpecifiedTable'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_SpecifiedTable.inc.php';
			break;

		case('Database_SpecifiedTableFieldTypeTests'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/unit-tests/Database_SpecifiedTableFieldTypeTests.inc.php';
			break;

		case('Database_SQLClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLClause.inc.php';
			break;

		case('Database_SQLDeleteStatement'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/statements/Database_SQLDeleteStatement.inc.php';
			break;

		case('Database_SQLDirectory'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_SQLDirectory.inc.php';
			break;

		case('Database_SQLFile'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/file-system/files/Database_SQLFile.inc.php';
			break;

		case('Database_SQLFromClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLFromClause.inc.php';
			break;

		case('Database_SQLFromClauseJoinSubSubClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLFromClauseJoinSubSubClause.inc.php';
			break;

		case('Database_SQLFromClauseTableReference'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLFromClauseTableReference.inc.php';
			break;

		case('Database_SQLInsertStatement'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/statements/Database_SQLInsertStatement.inc.php';
			break;

		case('Database_SQLLimitClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLLimitClause.inc.php';
			break;

		case('Database_SQLOrderByClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLOrderByClause.inc.php';
			break;

		case('Database_SQLOrderByClauseFieldSubClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLOrderByClauseFieldSubClause.inc.php';
			break;

		case('Database_SQLSelectClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLSelectClause.inc.php';
			break;

		case('Database_SQLSelectClauseFieldSubClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLSelectClauseFieldSubClause.inc.php';
			break;

		case('Database_SQLSelectQuery'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/statements/Database_SQLSelectQuery.inc.php';
			break;

		case('Database_SQLSetClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLSetClause.inc.php';
			break;

		case('Database_SQLStatement'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/statements/Database_SQLStatement.inc.php';
			break;

		case('Database_SQLStatementBehaviour'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/behaviours/Database_SQLStatementBehaviour.inc.php';
			break;

		case('Database_SQLStatementWithSetClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/statements/Database_SQLStatementWithSetClause.inc.php';
			break;

		case('Database_SQLStatementWithWhereClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/statements/Database_SQLStatementWithWhereClause.inc.php';
			break;

		case('Database_SQLSubClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLSubClause.inc.php';
			break;

		case('Database_SQLUpdateClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLUpdateClause.inc.php';
			break;

		case('Database_SQLUpdateClauseFieldSubClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLUpdateClauseFieldSubClause.inc.php';
			break;

		case('Database_SQLUpdateClauseQuotedValueFieldSubClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLUpdateClauseQuotedValueFieldSubClause.inc.php';
			break;

		case('Database_SQLUpdateStatement'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/statements/Database_SQLUpdateStatement.inc.php';
			break;

		case('Database_SQLWhereClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLWhereClause.inc.php';
			break;

		case('Database_SQLWhereClauseBinaryOperatorConditionSubClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLWhereClauseBinaryOperatorConditionSubClause.inc.php';
			break;

		case('Database_SQLWhereClauseConditionSubClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLWhereClauseConditionSubClause.inc.php';
			break;

		case('Database_SQLWhereClauseFieldInListConditionSubClause'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/sql/clauses/Database_SQLWhereClauseFieldInListConditionSubClause.inc.php';
			break;

		case('Database_StringField'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/field-subclasses/Database_StringField.inc.php';
			break;

		case('Database_SyncDatabaseWithTableSpecificationCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/cli-scripts/Database_SyncDatabaseWithTableSpecificationCLIScript.inc.php';
			break;

		case('Database_SyncTableSpecificationWithDatabaseCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/cli-scripts/Database_SyncTableSpecificationWithDatabaseCLIScript.inc.php';
			break;

		case('Database_Table'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/Database_Table.inc.php';
			break;

		case('Database_TableHelper'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/helpers/Database_TableHelper.inc.php';
			break;

		case('Database_TableNameTranslator'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_TableNameTranslator.inc.php';
			break;

		case('Database_TableNameTranslatorFactory'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/Database_TableNameTranslatorFactory.inc.php';
			break;

		case('Database_TableRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/Database_TableRenderer.inc.php';
			break;

		case('Database_TableSpecificationDirectory'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/table-structure-synchronisation/Database_TableSpecificationDirectory.inc.php';
			break;

		case('Database_TableSpecificationFile'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/table-structure-synchronisation/Database_TableSpecificationFile.inc.php';
			break;

		case('Database_TableSpecificationHelper'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/helpers/Database_TableSpecificationHelper.inc.php';
			break;

		case('Database_TableSpecificationTests'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/unit-tests/Database_TableSpecificationTests.inc.php';
			break;

		case('Database_TableStructureManager'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/table-structure-synchronisation/Database_TableStructureManager.inc.php';
			break;

		case('Database_TemporalField'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/field-subclasses/Database_TemporalField.inc.php';
			break;

		case('Database_TextField'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/field-subclasses/Database_TextField.inc.php';
			break;

		case('Database_TimeFieldRenderer'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/renderers/field-renderers/Database_TimeFieldRenderer.inc.php';
			break;

		case('Database_UnableToMakeConnectionException'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/exceptions/Database_UnableToMakeConnectionException.inc.php';
			break;

		case('Database_UserInputTooLongException'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/exceptions/Database_UserInputTooLongException.inc.php';
			break;

		case('Database_UsernameValidator'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/input-validation/Database_UsernameValidator.inc.php';
			break;

		case('Database_UsernameValidatorTests'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/unit-tests/Database_UsernameValidatorTests.inc.php';
			break;

		case('Database_VarCharField'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/elements/field-subclasses/Database_VarCharField.inc.php';
			break;

		case('DataStructures_BinarySearchTree'): 
			require_once PROJECT_ROOT . '/haddock/data-structures/classes/DataStructures_BinarySearchTree.inc.php';
			break;

		case('DataStructures_BSTNode'): 
			require_once PROJECT_ROOT . '/haddock/data-structures/classes/DataStructures_BSTNode.inc.php';
			break;

		case('DB'): 
			require_once PROJECT_ROOT . '/haddock/database/classes/DB.inc.php';
			break;

		case('DBPages_AdminHelper'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/helpers/DBPages_AdminHelper.inc.php';
			break;

		case('DBPages_ConfigManager'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/managers/config/DBPages_ConfigManager.inc.php';
			break;

		case('DBPages_ContentManager'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/DBPages_ContentManager.inc.php';
			break;

		case('DBPages_CRUDAdminManager'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/DBPages_CRUDAdminManager.inc.php';
			break;

		case('DBPages_FetchAllSectionsForPageSelectQuery'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/database/sql/statements/DBPages_FetchAllSectionsForPageSelectQuery.inc.php';
			break;

		case('DBPages_FilterHelper'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/DBPages_FilterHelper.inc.php';
			break;

		case('DBPages_HTMLPage'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/pages/html/DBPages_HTMLPage.inc.php';
			break;

		case('DBPages_ManagePagesAdminPage'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/pages/DBPages_ManagePagesAdminPage.inc.php';
			break;

		case('DBPages_ManagePagesAdminRedirectScript'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/pages/DBPages_ManagePagesAdminRedirectScript.inc.php';
			break;

		case('DBPages_Page'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/DBPages_Page.inc.php';
			break;

		case('DBPages_PageRenderer'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/renderers/DBPages_PageRenderer.inc.php';
			break;

		case('DBPages_PageSectionNotFoundException'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/exceptions/DBPages_PageSectionNotFoundException.inc.php';
			break;

		case('DBPages_PCROFactory'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/DBPages_PCROFactory.inc.php';
			break;

		case('DBPages_Section'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/DBPages_Section.inc.php';
			break;

		case('DBPages_SectionsHelper'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/helpers/DBPages_SectionsHelper.inc.php';
			break;

		case('DBPages_SPoE'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/DBPages_SPoE.inc.php';
			break;

		case('DPPages_URLsHelper'): 
			require_once PROJECT_ROOT . '/plug-ins/db-pages/classes/helpers/DPPages_URLsHelper.inc.php';
			break;

		case('EmailAddresses_EmailAddressHelper'): 
			require_once PROJECT_ROOT . '/plug-ins/email-addresses/classes/helpers/EmailAddresses_EmailAddressHelper.inc.php';
			break;

		case('EmailAddresses_EmailAddressRenderer'): 
			require_once PROJECT_ROOT . '/plug-ins/email-addresses/classes/renderers/EmailAddresses_EmailAddressRenderer.inc.php';
			break;

		case('EmailAddresses_MailToA'): 
			require_once PROJECT_ROOT . '/plug-ins/email-addresses/classes/html-tags/EmailAddresses_MailToA.inc.php';
			break;

		case('Environment_MachineHelper'): 
			require_once PROJECT_ROOT . '/haddock/environment/classes/helpers/Environment_MachineHelper.inc.php';
			break;

		case('Environment_ProcessesHelper'): 
			require_once PROJECT_ROOT . '/haddock/environment/classes/helpers/Environment_ProcessesHelper.inc.php';
			break;

		case('ErrorHandling_SprintfException'): 
			require_once PROJECT_ROOT . '/haddock/error-handling/classes/exceptions/ErrorHandling_SprintfException.inc.php';
			break;

		case('FileSystem_Bz2TextFile'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/FileSystem_Bz2TextFile.inc.php';
			break;

		case('FileSystem_CreateDirectoryClassCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/cli-scripts/FileSystem_CreateDirectoryClassCLIScript.inc.php';
			break;

		case('FileSystem_CreateFileClassCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/cli-scripts/FileSystem_CreateFileClassCLIScript.inc.php';
			break;

		case('FileSystem_DataFile'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/FileSystem_DataFile.inc.php';
			break;

		case('FileSystem_Directory'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/FileSystem_Directory.inc.php';
			break;

		case('FileSystem_DirectoryClassesHelper'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/helpers/FileSystem_DirectoryClassesHelper.inc.php';
			break;

		case('FileSystem_DirectoryClassNameValidator'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/input-validation/FileSystem_DirectoryClassNameValidator.inc.php';
			break;

		case('FileSystem_DirectoryHelper'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/helpers/FileSystem_DirectoryHelper.inc.php';
			break;

		case('FileSystem_DirectoryHelperTests'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/unit-tests/FileSystem_DirectoryHelperTests.inc.php';
			break;

		case('FileSystem_ExistingDirectoryRelativeToProjectRootCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/cli-scripts/FileSystem_ExistingDirectoryRelativeToProjectRootCLIScript.inc.php';
			break;

		case('FileSystem_ExistingDirectoryRelativeToProjectRootValidator'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/input-validation/FileSystem_ExistingDirectoryRelativeToProjectRootValidator.inc.php';
			break;

		case('FileSystem_File'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/FileSystem_File.inc.php';
			break;

		case('FileSystem_FileClassesHelper'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/helpers/FileSystem_FileClassesHelper.inc.php';
			break;

		case('FileSystem_FileClassNameValidator'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/input-validation/FileSystem_FileClassNameValidator.inc.php';
			break;

		case('FileSystem_FileNotFoundException'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/exceptions/FileSystem_FileNotFoundException.inc.php';
			break;

		case('FileSystem_PHPClassFile'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/FileSystem_PHPClassFile.inc.php';
			break;

		case('FileSystem_PHPFile'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/files/FileSystem_PHPFile.inc.php';
			break;

		case('FileSystem_PHPIncFile'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/FileSystem_PHPIncFile.inc.php';
			break;

		case('FileSystem_SVNReposDumpFile'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/FileSystem_SVNReposDumpFile.inc.php';
			break;

		case('FileSystem_SVNRepositoryDirectory'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/FileSystem_SVNRepositoryDirectory.inc.php';
			break;

		case('FileSystem_SVNWorkingDirectory'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/FileSystem_SVNWorkingDirectory.inc.php';
			break;

		case('FileSystem_TextFile'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/FileSystem_TextFile.inc.php';
			break;

		case('FileSystem_TextFileWithComments'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/FileSystem_TextFileWithComments.inc.php';
			break;

		case('FileSystem_XMLFile'): 
			require_once PROJECT_ROOT . '/haddock/file-system/classes/FileSystem_XMLFile.inc.php';
			break;

		case('Formatting_CountingNumber'): 
			require_once PROJECT_ROOT . '/haddock/formatting/classes/Formatting_CountingNumber.inc.php';
			break;

		case('Formatting_DateTime'): 
			require_once PROJECT_ROOT . '/haddock/formatting/classes/Formatting_DateTime.inc.php';
			break;

		case('Formatting_FileName'): 
			require_once PROJECT_ROOT . '/haddock/formatting/classes/Formatting_FileName.inc.php';
			break;

		case('Formatting_ListOfWords'): 
			require_once PROJECT_ROOT . '/haddock/formatting/classes/Formatting_ListOfWords.inc.php';
			break;

		case('Formatting_ListOfWordsHelper'): 
			require_once PROJECT_ROOT . '/haddock/formatting/classes/helpers/Formatting_ListOfWordsHelper.inc.php';
			break;

		case('Formatting_Number'): 
			require_once PROJECT_ROOT . '/haddock/formatting/classes/Formatting_Number.inc.php';
			break;

		case('Formatting_NumbersHelper'): 
			require_once PROJECT_ROOT . '/haddock/formatting/classes/Formatting_NumbersHelper.inc.php';
			break;

		case('Formatting_Word'): 
			require_once PROJECT_ROOT . '/haddock/formatting/classes/Formatting_Word.inc.php';
			break;

		case('HaddockProjectOrganisation_AbstractModuleConfigXMLFile'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/files/HaddockProjectOrganisation_AbstractModuleConfigXMLFile.inc.php';
			break;

		case('HaddockProjectOrganisation_AbstractPlugInModuleDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_AbstractPlugInModuleDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_AssembleAutoloadFileCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/cli-scripts/HaddockProjectOrganisation_AssembleAutoloadFileCLIScript.inc.php';
			break;

		case('HaddockProjectOrganisation_AutoloadFilesHelper'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/helpers/HaddockProjectOrganisation_AutoloadFilesHelper.inc.php';
			break;

		case('HaddockProjectOrganisation_AutoloadHelper'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/helpers/HaddockProjectOrganisation_AutoloadHelper.inc.php';
			break;

		case('HaddockProjectOrganisation_AutoloadIncFile'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/files/HaddockProjectOrganisation_AutoloadIncFile.inc.php';
			break;

		case('HaddockProjectOrganisation_CamelCaseRootValidator'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/input-validation/HaddockProjectOrganisation_CamelCaseRootValidator.inc.php';
			break;

		case('HaddockProjectOrganisation_ClassesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_ClassesDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_CLIModuleDirectoryFinder'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/finders/HaddockProjectOrganisation_CLIModuleDirectoryFinder.inc.php';
			break;

		case('HaddockProjectOrganisation_CLIScriptDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_CLIScriptDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_ConfigDBManager'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/managers/HaddockProjectOrganisation_ConfigDBManager.inc.php';
			break;

		case('HaddockProjectOrganisation_ConfigFile'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/files/HaddockProjectOrganisation_ConfigFile.inc.php';
			break;

		case('HaddockProjectOrganisation_ConfigManager'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/managers/HaddockProjectOrganisation_ConfigManager.inc.php';
			break;

		case('HaddockProjectOrganisation_ConfigManagerFactory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/factories/HaddockProjectOrganisation_ConfigManagerFactory.inc.php';
			break;

		case('HaddockProjectOrganisation_CoreModuleDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_CoreModuleDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_CoreModulesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_CoreModulesDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_CreateHaddockClassNameValidatorCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/cli-scripts/HaddockProjectOrganisation_CreateHaddockClassNameValidatorCLIScript.inc.php';
			break;

		case('HaddockProjectOrganisation_HaddockClassNameValidator'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/input-validation/HaddockProjectOrganisation_HaddockClassNameValidator.inc.php';
			break;

		case('HaddockProjectOrganisation_HaddockClassNameValidatorNameValidator'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/input-validation/HaddockProjectOrganisation_HaddockClassNameValidatorNameValidator.inc.php';
			break;

		case('HaddockProjectOrganisation_HaddockClassNameValidatorsHelper'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/helpers/HaddockProjectOrganisation_HaddockClassNameValidatorsHelper.inc.php';
			break;

		case('HaddockProjectOrganisation_HaddockDirectoryTests'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/unit-tests/HaddockProjectOrganisation_HaddockDirectoryTests.inc.php';
			break;

		case('HaddockProjectOrganisation_HPOConfigManager'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/managers/HaddockProjectOrganisation_HPOConfigManager.inc.php';
			break;

		case('HaddockProjectOrganisation_IncludesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_IncludesDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_ListModuleNamesCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/cli-scripts/HaddockProjectOrganisation_ListModuleNamesCLIScript.inc.php';
			break;

		case('HaddockProjectOrganisation_LoginException'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/exceptions/HaddockProjectOrganisation_LoginException.inc.php';
			break;

		case('HaddockProjectOrganisation_LoginManager'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/managers/HaddockProjectOrganisation_LoginManager.inc.php';
			break;

		case('HaddockProjectOrganisation_ModuleConfigException'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/exceptions/HaddockProjectOrganisation_ModuleConfigException.inc.php';
			break;

		case('HaddockProjectOrganisation_ModuleConfigFile'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/HaddockProjectOrganisation_ModuleConfigFile.inc.php';
			break;

		case('HaddockProjectOrganisation_ModuleConfigXMLFile'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/files/HaddockProjectOrganisation_ModuleConfigXMLFile.inc.php';
			break;

		case('HaddockProjectOrganisation_ModuleDirectoriesCamelCaseRootsHelper'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/helpers/HaddockProjectOrganisation_ModuleDirectoriesCamelCaseRootsHelper.inc.php';
			break;

		case('HaddockProjectOrganisation_ModuleDirectoriesHelper'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/helpers/HaddockProjectOrganisation_ModuleDirectoriesHelper.inc.php';
			break;

		case('HaddockProjectOrganisation_ModuleDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_ModuleDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_ModuleDirectoryCamelCaseRootValidator'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/input-validation/HaddockProjectOrganisation_ModuleDirectoryCamelCaseRootValidator.inc.php';
			break;

		case('HaddockProjectOrganisation_ModuleDirectoryHelper'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/helpers/HaddockProjectOrganisation_ModuleDirectoryHelper.inc.php';
			break;

		case('HaddockProjectOrganisation_ModuleDirectoryNamesHelper'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/helpers/HaddockProjectOrganisation_ModuleDirectoryNamesHelper.inc.php';
			break;

		case('HaddockProjectOrganisation_ModuleNameTests'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/unit-tests/HaddockProjectOrganisation_ModuleNameTests.inc.php';
			break;

		case('HaddockProjectOrganisation_ModulesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_ModulesDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_NavigationLinksFile'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/files/HaddockProjectOrganisation_NavigationLinksFile.inc.php';
			break;

		case('HaddockProjectOrganisation_OptionButtonsFactory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/factories/HaddockProjectOrganisation_OptionButtonsFactory.inc.php';
			break;

		case('HaddockProjectOrganisation_PageConfigFile'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/files/HaddockProjectOrganisation_PageConfigFile.inc.php';
			break;

		case('HaddockProjectOrganisation_PageDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_PageDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_PagesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_PagesDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_PasswordResetException'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/exceptions/HaddockProjectOrganisation_PasswordResetException.inc.php';
			break;

		case('HaddockProjectOrganisation_PHPIncFile'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/files/HaddockProjectOrganisation_PHPIncFile.inc.php';
			break;

		case('HaddockProjectOrganisation_PlugInModuleDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_PlugInModuleDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_PlugInModulesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_PlugInModulesDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_PlugInsDirectoryTests'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/unit-tests/HaddockProjectOrganisation_PlugInsDirectoryTests.inc.php';
			break;

		case('HaddockProjectOrganisation_ProjectDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_ProjectDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_ProjectDirectoryFinder'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/finders/HaddockProjectOrganisation_ProjectDirectoryFinder.inc.php';
			break;

		case('HaddockProjectOrganisation_ProjectDirectoryHelper'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/helpers/HaddockProjectOrganisation_ProjectDirectoryHelper.inc.php';
			break;

		case('HaddockProjectOrganisation_ProjectInformationHelper'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/helpers/HaddockProjectOrganisation_ProjectInformationHelper.inc.php';
			break;

		case('HaddockProjectOrganisation_ProjectInformationSettingTests'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/unit-tests/HaddockProjectOrganisation_ProjectInformationSettingTests.inc.php';
			break;

		case('HaddockProjectOrganisation_ProjectInformationTests'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/unit-tests/HaddockProjectOrganisation_ProjectInformationTests.inc.php';
			break;

		case('HaddockProjectOrganisation_ProjectNameValidator'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/input-validation/HaddockProjectOrganisation_ProjectNameValidator.inc.php';
			break;

		case('HaddockProjectOrganisation_ProjectSpecificConfigFile'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/files/HaddockProjectOrganisation_ProjectSpecificConfigFile.inc.php';
			break;

		case('HaddockProjectOrganisation_ProjectSpecificDataHelper'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/helpers/HaddockProjectOrganisation_ProjectSpecificDataHelper.inc.php';
			break;

		case('HaddockProjectOrganisation_ProjectSpecificDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_ProjectSpecificDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_ProjectSpecificDirectoryHelper'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/helpers/HaddockProjectOrganisation_ProjectSpecificDirectoryHelper.inc.php';
			break;

		case('HaddockProjectOrganisation_ProjectSpecificDirectoryTests'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/unit-tests/HaddockProjectOrganisation_ProjectSpecificDirectoryTests.inc.php';
			break;

		case('HaddockProjectOrganisation_ProjectTitleInferenceTests'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/unit-tests/HaddockProjectOrganisation_ProjectTitleInferenceTests.inc.php';
			break;

		case('HaddockProjectOrganisation_PSModuleConfigFile'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/files/HaddockProjectOrganisation_PSModuleConfigFile.inc.php';
			break;

		case('HaddockProjectOrganisation_PublicPageDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_PublicPageDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_RequiredModulesFile'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/files/HaddockProjectOrganisation_RequiredModulesFile.inc.php';
			break;

		case('HaddockProjectOrganisation_SetModuleDirectoryCamelCaseRootCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/cli-scripts/HaddockProjectOrganisation_SetModuleDirectoryCamelCaseRootCLIScript.inc.php';
			break;

		case('HaddockProjectOrganisation_SetProjectInformationCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/cli-scripts/HaddockProjectOrganisation_SetProjectInformationCLIScript.inc.php';
			break;

		case('HaddockProjectOrganisation_ShowProjectInformationCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/cli-scripts/HaddockProjectOrganisation_ShowProjectInformationCLIScript.inc.php';
			break;

		case('HaddockProjectOrganisation_StandardModuleSubDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_StandardModuleSubDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_StartPageWidget'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/HaddockProjectOrganisation_StartPageWidget.inc.php';
			break;

		case('HaddockProjectOrganisation_WWWIncludesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_WWWIncludesDirectory.inc.php';
			break;

		case('HaddockProjectOrganisation_WWWPageDirectory'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/file-system/directories/HaddockProjectOrganisation_WWWPageDirectory.inc.php';
			break;

		case('HPO_NoISCFileException'): 
			require_once PROJECT_ROOT . '/haddock/haddock-project-organisation/classes/exceptions/HPO_NoISCFileException.inc.php';
			break;

		case('HTMLTags_A'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_A.inc.php';
			break;

		case('HTMLTags_Abbr'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Abbr.inc.php';
			break;

		case('HTMLTags_Attribute'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/HTMLTags_Attribute.inc.php';
			break;

		case('HTMLTags_AttributeWithValue'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/HTMLTags_AttributeWithValue.inc.php';
			break;

		case('HTMLTags_BareAttribute'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/HTMLTags_BareAttribute.inc.php';
			break;

		case('HTMLTags_BLSeparatedPFactory'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/factories/HTMLTags_BLSeparatedPFactory.inc.php';
			break;

		case('HTMLTags_BLSeparatedPsRenderer'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/renderers/HTMLTags_BLSeparatedPsRenderer.inc.php';
			break;

		case('HTMLTags_BR'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_BR.inc.php';
			break;

		case('HTMLTags_Button'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Button.inc.php';
			break;

		case('HTMLTags_Caption'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Caption.inc.php';
			break;

		case('HTMLTags_Code'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Code.inc.php';
			break;

		case('HTMLTags_ColGroup'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_ColGroup.inc.php';
			break;

		case('HTMLTags_ConfirmationP'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/extensions/HTMLTags_ConfirmationP.inc.php';
			break;

		case('HTMLTags_DD'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_DD.inc.php';
			break;

		case('HTMLTags_Div'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Div.inc.php';
			break;

		case('HTMLTags_DL'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_DL.inc.php';
			break;

		case('HTMLTags_DT'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_DT.inc.php';
			break;

		case('HTMLTags_Em'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Em.inc.php';
			break;

		case('HTMLTags_Embed'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Embed.inc.php';
			break;

		case('HTMLTags_ExceptionDiv'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/extensions/HTMLTags_ExceptionDiv.inc.php';
			break;

		case('HTMLTags_FieldSet'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_FieldSet.inc.php';
			break;

		case('HTMLTags_FillTable'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/extensions/HTMLTags_FillTable.inc.php';
			break;

		case('HTMLTags_FluidBoxDiv'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/extensions/HTMLTags_FluidBoxDiv.inc.php';
			break;

		case('HTMLTags_Form'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Form.inc.php';
			break;

		case('HTMLTags_FormActionAttribute'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/HTMLTags_FormActionAttribute.inc.php';
			break;

		case('HTMLTags_FormWithInputs'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/extensions/HTMLTags_FormWithInputs.inc.php';
			break;

		case('HTMLTags_Heading'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Heading.inc.php';
			break;

		case('HTMLTags_HiddenInput'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/extensions/HTMLTags_HiddenInput.inc.php';
			break;

		case('HTMLTags_HR'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_HR.inc.php';
			break;

		case('HTMLTags_HReviewDiv'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/extensions/HTMLTags_HReviewDiv.inc.php';
			break;

		case('HTMLTags_IMG'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_IMG.inc.php';
			break;

		case('HTMLTags_Input'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Input.inc.php';
			break;

		case('HTMLTags_InputTag'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/HTMLTags_InputTag.inc.php';
			break;

		case('HTMLTags_Label'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Label.inc.php';
			break;

		case('HTMLTags_LastActionBoxDiv'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/extensions/HTMLTags_LastActionBoxDiv.inc.php';
			break;

		case('HTMLTags_Legend'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Legend.inc.php';
			break;

		case('HTMLTags_LI'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_LI.inc.php';
			break;

		case('HTMLTags_Link'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Link.inc.php';
			break;

		case('HTMLTags_LinkFactory'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/factories/HTMLTags_LinkFactory.inc.php';
			break;

		case('HTMLTags_LinkRenderer'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/renderers/HTMLTags_LinkRenderer.inc.php';
			break;

		case('HTMLTags_List'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/HTMLTags_List.inc.php';
			break;

		case('HTMLTags_Meta'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Meta.inc.php';
			break;

		case('HTMLTags_MetaWithNameAndContent'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/extensions/HTMLTags_MetaWithNameAndContent.inc.php';
			break;

		case('HTMLTags_Noscript'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Noscript.inc.php';
			break;

		case('HTMLTags_Object'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Object.inc.php';
			break;

		case('HTMLTags_OL'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_OL.inc.php';
			break;

		case('HTMLTags_Option'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Option.inc.php';
			break;

		case('HTMLTags_P'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_P.inc.php';
			break;

		case('HTMLTags_Param'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Param.inc.php';
			break;

		case('HTMLTags_Pre'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Pre.inc.php';
			break;

		case('HTMLTags_Script'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Script.inc.php';
			break;

		case('HTMLTags_ScriptRenderer'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/renderers/HTMLTags_ScriptRenderer.inc.php';
			break;

		case('HTMLTags_Select'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Select.inc.php';
			break;

		case('HTMLTags_SelectFactory'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/factories/HTMLTags_SelectFactory.inc.php';
			break;

		case('HTMLTags_SimpleForm'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/extensions/HTMLTags_SimpleForm.inc.php';
			break;

		case('HTMLTags_SimpleOLForm'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/extensions/HTMLTags_SimpleOLForm.inc.php';
			break;

		case('HTMLTags_Span'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Span.inc.php';
			break;

		case('HTMLTags_StyleSheetLink'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/extensions/HTMLTags_StyleSheetLink.inc.php';
			break;

		case('HTMLTags_Table'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Table.inc.php';
			break;

		case('HTMLTags_Tag'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/HTMLTags_Tag.inc.php';
			break;

		case('HTMLTags_TagContent'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/HTMLTags_TagContent.inc.php';
			break;

		case('HTMLTags_TagWithContent'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/HTMLTags_TagWithContent.inc.php';
			break;

		case('HTMLTags_TagWithoutContent'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/HTMLTags_TagWithoutContent.inc.php';
			break;

		case('HTMLTags_TBody'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_TBody.inc.php';
			break;

		case('HTMLTags_TD'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_TD.inc.php';
			break;

		case('HTMLTags_TextArea'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_TextArea.inc.php';
			break;

		case('HTMLTags_TFoot'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_TFoot.inc.php';
			break;

		case('HTMLTags_TH'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_TH.inc.php';
			break;

		case('HTMLTags_THead'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_THead.inc.php';
			break;

		case('HTMLTags_Title'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_Title.inc.php';
			break;

		case('HTMLTags_TR'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_TR.inc.php';
			break;

		case('HTMLTags_TruncatedSpanFactory'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/factories/HTMLTags_TruncatedSpanFactory.inc.php';
			break;

		case('HTMLTags_UL'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/standard/HTMLTags_UL.inc.php';
			break;

		case('HTMLTags_URL'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/HTMLTags_URL.inc.php';
			break;

		case('HTMLTags_ValueNotSetInSelectException'): 
			require_once PROJECT_ROOT . '/haddock/html-tags/classes/exceptions/HTMLTags_ValueNotSetInSelectException.inc.php';
			break;

		case('InputValidation_CLIInterrogator'): 
			require_once PROJECT_ROOT . '/haddock/input-validation/classes/InputValidation_CLIInterrogator.inc.php';
			break;

		case('InputValidation_CreateInputValidatorCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/input-validation/classes/cli-scripts/InputValidation_CreateInputValidatorCLIScript.inc.php';
			break;

		case('InputValidation_CreateRegexValidatorCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/input-validation/classes/cli-scripts/InputValidation_CreateRegexValidatorCLIScript.inc.php';
			break;

		case('InputValidation_EmailAddressValidator'): 
			require_once PROJECT_ROOT . '/haddock/input-validation/classes/InputValidation_EmailAddressValidator.inc.php';
			break;

		case('InputValidation_InputValidatorNameValidator'): 
			require_once PROJECT_ROOT . '/haddock/input-validation/classes/input-validation/InputValidation_InputValidatorNameValidator.inc.php';
			break;

		case('InputValidation_InputValidatorsHelper'): 
			require_once PROJECT_ROOT . '/haddock/input-validation/classes/helpers/InputValidation_InputValidatorsHelper.inc.php';
			break;

		case('InputValidation_InvalidInputException'): 
			require_once PROJECT_ROOT . '/haddock/input-validation/classes/InputValidation_InvalidInputException.inc.php';
			break;

		case('InputValidation_NumberValidator'): 
			require_once PROJECT_ROOT . '/haddock/input-validation/classes/InputValidation_NumberValidator.inc.php';
			break;

		case('InputValidation_RegexValidator'): 
			require_once PROJECT_ROOT . '/haddock/input-validation/classes/input-validation/InputValidation_RegexValidator.inc.php';
			break;

		case('InputValidation_StringValidator'): 
			require_once PROJECT_ROOT . '/haddock/input-validation/classes/InputValidation_StringValidator.inc.php';
			break;

		case('InputValidation_Validator'): 
			require_once PROJECT_ROOT . '/haddock/input-validation/classes/InputValidation_Validator.inc.php';
			break;

		case('Logging_Logger'): 
			require_once PROJECT_ROOT . '/haddock/logging/classes/Logging_Logger.inc.php';
			break;

		case('Logging_LogsHelper'): 
			require_once PROJECT_ROOT . '/haddock/logging/classes/helpers/Logging_LogsHelper.inc.php';
			break;

		case('Logging_ServerLogsTable'): 
			require_once PROJECT_ROOT . '/haddock/logging/classes/database/elements/table-subclasses/Logging_ServerLogsTable.inc.php';
			break;

		case('Logging_ServerLogsTableRenderer'): 
			require_once PROJECT_ROOT . '/haddock/logging/classes/database/renderers/table-renderers/Logging_ServerLogsTableRenderer.inc.php';
			break;

		case('MailingList_ConfigManager'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/MailingList_ConfigManager.inc.php';
			break;

		case('MailingList_EmailTooLongException'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/exceptions/MailingList_EmailTooLongException.inc.php';
			break;

		case('MailingList_InvalidEmailException'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/exceptions/MailingList_InvalidEmailException.inc.php';
			break;

		case('MailingList_ListAddressesAdminPage'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/pages/html/MailingList_ListAddressesAdminPage.inc.php';
			break;

		case('MailingList_NameAndEmailException'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/exceptions/MailingList_NameAndEmailException.inc.php';
			break;

		case('MailingList_NameTooLongException'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/exceptions/MailingList_NameTooLongException.inc.php';
			break;

		case('MailingList_PCROFactory'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/MailingList_PCROFactory.inc.php';
			break;

		case('MailingList_PeopleHelper'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/helpers/MailingList_PeopleHelper.inc.php';
			break;

		case('MailingList_PeopleTable'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/database/elements/table-subclasses/MailingList_PeopleTable.inc.php';
			break;

		case('MailingList_PeopleTableRenderer'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/database/renderers/table-renderers/MailingList_PeopleTableRenderer.inc.php';
			break;

		case('MailingList_PersonRow'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/database/elements/row-subclasses/MailingList_PersonRow.inc.php';
			break;

		case('MailingList_PersonRowRenderer'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/database/renderers/row-renderers/MailingList_PersonRowRenderer.inc.php';
			break;

		case('MailingList_SignUpPage'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/pages/html/MailingList_SignUpPage.inc.php';
			break;

		case('MailingList_SignUpRedirectScript'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/pages/redirect-scripts/MailingList_SignUpRedirectScript.inc.php';
			break;

		case('MailingList_SignUpRenderer'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/renderers/MailingList_SignUpRenderer.inc.php';
			break;

		case('MailingList_SignUpURLFactory'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/url-factories/MailingList_SignUpURLFactory.inc.php';
			break;

		case('MailingList_StartPageWidget'): 
			require_once PROJECT_ROOT . '/plug-ins/mailing-list/classes/MailingList_StartPageWidget.inc.php';
			break;

		case('ModelViewController_Model'): 
			require_once PROJECT_ROOT . '/haddock/model-view-controller/classes/ModelViewController_Model.inc.php';
			break;

		case('Navigation_1DTreeRetriever'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/database/retrievers/Navigation_1DTreeRetriever.inc.php';
			break;

		case('Navigation_1DULRenderer'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/renderers/Navigation_1DULRenderer.inc.php';
			break;

		case('Navigation_AddNodeToProjectSpecific1DTreeCLIScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/cli-scripts/Navigation_AddNodeToProjectSpecific1DTreeCLIScript.inc.php';
			break;

		case('Navigation_AddProjectSpecific1DTreeCLIScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/cli-scripts/Navigation_AddProjectSpecific1DTreeCLIScript.inc.php';
			break;

		case('Navigation_DeleteAllNodesFromProjectSpecific1DTreeCLIScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/cli-scripts/Navigation_DeleteAllNodesFromProjectSpecific1DTreeCLIScript.inc.php';
			break;

		case('Navigation_DeleteAllProjectSpecific1DTreesCLIScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/cli-scripts/Navigation_DeleteAllProjectSpecific1DTreesCLIScript.inc.php';
			break;

		case('Navigation_DeleteNodeFromProjectSpecific1DTreeCLIScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/cli-scripts/Navigation_DeleteNodeFromProjectSpecific1DTreeCLIScript.inc.php';
			break;

		case('Navigation_DeleteProjectSpecific1DTreeCLIScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/cli-scripts/Navigation_DeleteProjectSpecific1DTreeCLIScript.inc.php';
			break;

		case('Navigation_EditNodeOfProjectSpecific1DTreeCLIScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/cli-scripts/Navigation_EditNodeOfProjectSpecific1DTreeCLIScript.inc.php';
			break;

		case('Navigation_EditProjectSpecific1DTreeCLIScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/cli-scripts/Navigation_EditProjectSpecific1DTreeCLIScript.inc.php';
			break;

		case('Navigation_HTMLListsHelper'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/helpers/Navigation_HTMLListsHelper.inc.php';
			break;

		case('Navigation_LinkNode'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/Navigation_LinkNode.inc.php';
			break;

		case('Navigation_LinksTree'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/Navigation_LinksTree.inc.php';
			break;

		case('Navigation_ListNodesOfProjectSpecific1DTreeCLIScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/cli-scripts/Navigation_ListNodesOfProjectSpecific1DTreeCLIScript.inc.php';
			break;

		case('Navigation_ListProjectSpecific1DTreesCLIScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/cli-scripts/Navigation_ListProjectSpecific1DTreesCLIScript.inc.php';
			break;

		case('Navigation_ListsHelper'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/helpers/Navigation_ListsHelper.inc.php';
			break;

		case('Navigation_ManageNodesAdminPage'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/pages/Navigation_ManageNodesAdminPage.inc.php';
			break;

		case('Navigation_ManageNodesAdminRedirectScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/pages/Navigation_ManageNodesAdminRedirectScript.inc.php';
			break;

		case('Navigation_ManageTreesAdminPage'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/pages/Navigation_ManageTreesAdminPage.inc.php';
			break;

		case('Navigation_ManageTreesAdminRedirectScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/pages/Navigation_ManageTreesAdminRedirectScript.inc.php';
			break;

		case('Navigation_ManageURLsAdminPage'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/pages/Navigation_ManageURLsAdminPage.inc.php';
			break;

		case('Navigation_ManageURLsAdminRedirectScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/pages/Navigation_ManageURLsAdminRedirectScript.inc.php';
			break;

		case('Navigation_NodeRenderer'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/renderers/Navigation_NodeRenderer.inc.php';
			break;

		case('Navigation_NodesCRUDManager'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/Navigation_NodesCRUDManager.inc.php';
			break;

		case('Navigation_NodesHelper'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/helpers/Navigation_NodesHelper.inc.php';
			break;

		case('Navigation_ShiftNodeOfProjectSpecific1DTreeCLIScript'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/cli-scripts/Navigation_ShiftNodeOfProjectSpecific1DTreeCLIScript.inc.php';
			break;

		case('Navigation_SPoE'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/Navigation_SPoE.inc.php';
			break;

		case('Navigation_TreesCRUDManager'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/Navigation_TreesCRUDManager.inc.php';
			break;

		case('Navigation_URLsCRUDManager'): 
			require_once PROJECT_ROOT . '/plug-ins/navigation/classes/Navigation_URLsCRUDManager.inc.php';
			break;

		case('News_ManageNewsItemsAdminPage'): 
			require_once PROJECT_ROOT . '/plug-ins/news/classes/crud-pages/manage-news-items/News_ManageNewsItemsAdminPage.inc.php';
			break;

		case('News_ManageNewsItemsAdminRedirectScript'): 
			require_once PROJECT_ROOT . '/plug-ins/news/classes/crud-pages/manage-news-items/News_ManageNewsItemsAdminRedirectScript.inc.php';
			break;

		case('News_NewsItemsCRUDManager'): 
			require_once PROJECT_ROOT . '/plug-ins/news/classes/crud-pages/manage-news-items/News_NewsItemsCRUDManager.inc.php';
			break;

		case('News_SPoE'): 
			require_once PROJECT_ROOT . '/plug-ins/news/classes/News_SPoE.inc.php';
			break;

		case('ObjectOrientation_CompilationTests'): 
			require_once PROJECT_ROOT . '/haddock/object-orientation/classes/unit-tests/ObjectOrientation_CompilationTests.inc.php';
			break;

		case('ObjectOrientation_CountPHPClassFilesInProjectCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/object-orientation/classes/cli-scripts/ObjectOrientation_CountPHPClassFilesInProjectCLIScript.inc.php';
			break;

		case('ObjectOrientation_CreateHelperCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/object-orientation/classes/cli-scripts/ObjectOrientation_CreateHelperCLIScript.inc.php';
			break;

		case('ObjectOrientation_HelperNameValidator'): 
			require_once PROJECT_ROOT . '/haddock/object-orientation/classes/input-validation/ObjectOrientation_HelperNameValidator.inc.php';
			break;

		case('ObjectOrientation_HelpersHelper'): 
			require_once PROJECT_ROOT . '/haddock/object-orientation/classes/helpers/ObjectOrientation_HelpersHelper.inc.php';
			break;

		case('ObjectOrientation_ModulesHelper'): 
			require_once PROJECT_ROOT . '/haddock/object-orientation/classes/helpers/ObjectOrientation_ModulesHelper.inc.php';
			break;

		case('ObjectOrientation_NamedMethodCaller'): 
			require_once PROJECT_ROOT . '/haddock/object-orientation/classes/ObjectOrientation_NamedMethodCaller.inc.php';
			break;

		case('ObjectOrientation_UpperCamelCaseValidator'): 
			require_once PROJECT_ROOT . '/haddock/object-orientation/classes/input-validation/ObjectOrientation_UpperCamelCaseValidator.inc.php';
			break;

		case('Oedipus_Act'): 
			require_once PROJECT_ROOT . '/project-specific/classes/Oedipus_Act.inc.php';
			break;

		case('Oedipus_Actor'): 
			require_once PROJECT_ROOT . '/project-specific/classes/Oedipus_Actor.inc.php';
			break;

		case('Oedipus_AddDramaHTMLForm'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_AddDramaHTMLForm.inc.php';
			break;

		case('Oedipus_AddFrameNoteHTMLForm'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_AddFrameNoteHTMLForm.inc.php';
			break;

		case('Oedipus_AddNoteHTMLForm'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_AddNoteHTMLForm.inc.php';
			break;

		case('Oedipus_AddTableHTMLForm'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_AddTableHTMLForm.inc.php';
			break;

		case('Oedipus_Character'): 
			require_once PROJECT_ROOT . '/project-specific/classes/Oedipus_Character.inc.php';
			break;

		case('Oedipus_DBPage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_DBPage.inc.php';
			break;

		case('Oedipus_Drama'): 
			require_once PROJECT_ROOT . '/project-specific/classes/Oedipus_Drama.inc.php';
			break;

		case('Oedipus_DramaEditorHelper'): 
			require_once PROJECT_ROOT . '/project-specific/classes/helpers/Oedipus_DramaEditorHelper.inc.php';
			break;

		case('Oedipus_DramaEditorRedirectScript'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/redirect-scripts/Oedipus_DramaEditorRedirectScript.inc.php';
			break;

		case('Oedipus_DramaHelper'): 
			require_once PROJECT_ROOT . '/project-specific/classes/helpers/Oedipus_DramaHelper.inc.php';
			break;

		case('Oedipus_DramaPage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_DramaPage.inc.php';
			break;

		case('Oedipus_DramaPageActionsUL'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_DramaPageActionsUL.inc.php';
			break;

		case('Oedipus_DramasHelper'): 
			require_once PROJECT_ROOT . '/project-specific/classes/helpers/Oedipus_DramasHelper.inc.php';
			break;

		case('Oedipus_EditDramaPage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_EditDramaPage.inc.php';
			break;

		case('Oedipus_EditDramaPageActionsUL'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_EditDramaPageActionsUL.inc.php';
			break;

		case('Oedipus_EditDramaStatusHTMLForm'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_EditDramaStatusHTMLForm.inc.php';
			break;

		case('Oedipus_EditFrameNoteHTMLForm'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_EditFrameNoteHTMLForm.inc.php';
			break;

		case('Oedipus_EditFrameNoteRedirectScript'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/redirect-scripts/Oedipus_EditFrameNoteRedirectScript.inc.php';
			break;

		case('Oedipus_EditNoteHTMLForm'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_EditNoteHTMLForm.inc.php';
			break;

		case('Oedipus_ExampleTablePage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_ExampleTablePage.inc.php';
			break;

		case('Oedipus_ExceptionPage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_ExceptionPage.inc.php';
			break;

		case('Oedipus_Frame'): 
			require_once PROJECT_ROOT . '/project-specific/classes/Oedipus_Frame.inc.php';
			break;

		case('Oedipus_FrameHTMLTable'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_FrameHTMLTable.inc.php';
			break;

		case('Oedipus_FrameImageHelper'): 
			require_once PROJECT_ROOT . '/project-specific/classes/helpers/Oedipus_FrameImageHelper.inc.php';
			break;

		case('Oedipus_FrameOptionsUL'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_FrameOptionsUL.inc.php';
			break;

		case('Oedipus_GDPNGImage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/png/Oedipus_GDPNGImage.inc.php';
			break;

		case('Oedipus_HomePage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_HomePage.inc.php';
			break;

		case('Oedipus_HTMLPage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_HTMLPage.inc.php';
			break;

		case('Oedipus_HTMLPageWithAccountStatus'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_HTMLPageWithAccountStatus.inc.php';
			break;

		case('Oedipus_LogInHelper'): 
			require_once PROJECT_ROOT . '/project-specific/classes/helpers/Oedipus_LogInHelper.inc.php';
			break;

		case('Oedipus_LoginPage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_LoginPage.inc.php';
			break;

		case('Oedipus_LoginValidator'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/Oedipus_LoginValidator.inc.php';
			break;

		case('Oedipus_LogOutRequest'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/Oedipus_LogOutRequest.inc.php';
			break;

		case('Oedipus_MailingListSignUpPage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_MailingListSignUpPage.inc.php';
			break;

		case('Oedipus_MyDramasPage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_MyDramasPage.inc.php';
			break;

		case('Oedipus_Note'): 
			require_once PROJECT_ROOT . '/project-specific/classes/Oedipus_Note.inc.php';
			break;

		case('Oedipus_NotesHelper'): 
			require_once PROJECT_ROOT . '/project-specific/classes/helpers/Oedipus_NotesHelper.inc.php';
			break;

		case('Oedipus_OedipusActorEditorHTMLForm'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_OedipusActorEditorHTMLForm.inc.php';
			break;

		case('Oedipus_OedipusAllDramasUL'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_OedipusAllDramasUL.inc.php';
			break;

		case('Oedipus_OedipusHTMLTable'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_OedipusHTMLTable.inc.php';
			break;

		case('Oedipus_OedipusMyDramasUL'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_OedipusMyDramasUL.inc.php';
			break;

		case('Oedipus_OedipusOptionEditorHTMLForm'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_OedipusOptionEditorHTMLForm.inc.php';
			break;

		case('Oedipus_OedipusShareDramaPageActionsUL'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_OedipusShareDramaPageActionsUL.inc.php';
			break;

		case('Oedipus_OedipusTableEditorActionsUL'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_OedipusTableEditorActionsUL.inc.php';
			break;

		case('Oedipus_OedipusTableEditorActorActionsUL'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_OedipusTableEditorActorActionsUL.inc.php';
			break;

		case('Oedipus_OedipusTableEditorHTMLForm'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_OedipusTableEditorHTMLForm.inc.php';
			break;

		case('Oedipus_OedipusTableEditorOptionActionsUL'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_OedipusTableEditorOptionActionsUL.inc.php';
			break;

		case('Oedipus_OedipusTableEditorPageActionsUL'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_OedipusTableEditorPageActionsUL.inc.php';
			break;

		case('Oedipus_OedipusTableEditorTableActionsUL'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_OedipusTableEditorTableActionsUL.inc.php';
			break;

		case('Oedipus_OedipusTableNameEditorHTMLForm'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_OedipusTableNameEditorHTMLForm.inc.php';
			break;

		case('Oedipus_Option'): 
			require_once PROJECT_ROOT . '/project-specific/classes/Oedipus_Option.inc.php';
			break;

		case('Oedipus_PageActionsUL'): 
			require_once PROJECT_ROOT . '/project-specific/classes/html-tags/Oedipus_PageActionsUL.inc.php';
			break;

		case('Oedipus_Position'): 
			require_once PROJECT_ROOT . '/project-specific/classes/Oedipus_Position.inc.php';
			break;

		case('Oedipus_RedirectScript'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/redirect-scripts/Oedipus_RedirectScript.inc.php';
			break;

		case('Oedipus_RegisterPage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_RegisterPage.inc.php';
			break;

		case('Oedipus_RegistrationValidator'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/Oedipus_RegistrationValidator.inc.php';
			break;

		case('Oedipus_RestrictedPage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_RestrictedPage.inc.php';
			break;

		case('Oedipus_RSSHelper'): 
			require_once PROJECT_ROOT . '/project-specific/classes/helpers/Oedipus_RSSHelper.inc.php';
			break;

		case('Oedipus_Scene'): 
			require_once PROJECT_ROOT . '/project-specific/classes/Oedipus_Scene.inc.php';
			break;

		case('Oedipus_ShareDramaPage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_ShareDramaPage.inc.php';
			break;

		case('Oedipus_StatedIntention'): 
			require_once PROJECT_ROOT . '/project-specific/classes/Oedipus_StatedIntention.inc.php';
			break;

		case('Oedipus_Table'): 
			require_once PROJECT_ROOT . '/project-specific/classes/Oedipus_Table.inc.php';
			break;

		case('Oedipus_TableCreationHelper'): 
			require_once PROJECT_ROOT . '/project-specific/classes/helpers/Oedipus_TableCreationHelper.inc.php';
			break;

		case('Oedipus_TableEditorPage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_TableEditorPage.inc.php';
			break;

		case('Oedipus_TableEditorRedirectScript'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/redirect-scripts/Oedipus_TableEditorRedirectScript.inc.php';
			break;

		case('Oedipus_TablePNGImage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/png/Oedipus_TablePNGImage.inc.php';
			break;

		case('Oedipus_UserPage'): 
			require_once PROJECT_ROOT . '/project-specific/classes/pages/html/Oedipus_UserPage.inc.php';
			break;

		case('Oedipus_UsersHelper'): 
			require_once PROJECT_ROOT . '/project-specific/classes/helpers/Oedipus_UsersHelper.inc.php';
			break;

		case('OrderedTables_AdminCRUDHelper'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/helpers/OrderedTables_AdminCRUDHelper.inc.php';
			break;

		case('OrderedTables_AdminCRUDManager'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/managers/OrderedTables_AdminCRUDManager.inc.php';
			break;

		case('OrderedTables_AdminCRUDShiftRedirectScript'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/pages/redirect-scripts/OrderedTables_AdminCRUDShiftRedirectScript.inc.php';
			break;

		case('OrderedTables_DataRow'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/database/elements/OrderedTables_DataRow.inc.php';
			break;

		case('OrderedTables_FARSFromClause'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/database/sql/clauses/OrderedTables_FARSFromClause.inc.php';
			break;

		case('OrderedTables_FARSOrderByClause'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/database/sql/clauses/OrderedTables_FARSOrderByClause.inc.php';
			break;

		case('OrderedTables_FARSSelectClause'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/database/sql/clauses/OrderedTables_FARSSelectClause.inc.php';
			break;

		case('OrderedTables_FetchAllRowsSelectQuery'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/database/sql/statements/OrderedTables_FetchAllRowsSelectQuery.inc.php';
			break;

		case('OrderedTables_ReorderRowsHTMLTable'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/html-tags/OrderedTables_ReorderRowsHTMLTable.inc.php';
			break;

		case('OrderedTables_ReorderTableAdminPage'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/pages/html/OrderedTables_ReorderTableAdminPage.inc.php';
			break;

		case('OrderedTables_ReorderTableAdminPageConfigFile'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/config-files/OrderedTables_ReorderTableAdminPageConfigFile.inc.php';
			break;

		case('OrderedTables_ReorderTableAdminPageConfigFileFactory'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/factories/OrderedTables_ReorderTableAdminPageConfigFileFactory.inc.php';
			break;

		case('OrderedTables_ReorderTableAdminPageHelper'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/helpers/OrderedTables_ReorderTableAdminPageHelper.inc.php';
			break;

		case('OrderedTables_ReorderTableAdminPageManager'): 
			require_once PROJECT_ROOT . '/plug-ins/ordered-tables/classes/managers/OrderedTables_ReorderTableAdminPageManager.inc.php';
			break;

		case('Persistence_Entry'): 
			require_once PROJECT_ROOT . '/haddock/persistence/classes/Persistence_Entry.inc.php';
			break;

		case('PublicHTML_AboutHaddockCMS'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/pages/html/PublicHTML_AboutHaddockCMS.inc.php';
			break;

		case('PublicHTML_AJAXFormHelper'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/helpers/PublicHTML_AJAXFormHelper.inc.php';
			break;

		case('PublicHTML_AllowAccessToDirectoryOnTheServerCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/cli-scripts/PublicHTML_AllowAccessToDirectoryOnTheServerCLIScript.inc.php';
			break;

		case('PublicHTML_AssembleHTAccessCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/cli-scripts/PublicHTML_AssembleHTAccessCLIScript.inc.php';
			break;

		case('PublicHTML_ConfigManager'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/PublicHTML_ConfigManager.inc.php';
			break;

		case('PublicHTML_CreateProjectSpecificHTMLPageClassCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/cli-scripts/PublicHTML_CreateProjectSpecificHTMLPageClassCLIScript.inc.php';
			break;

		case('PublicHTML_Exception'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/exceptions/PublicHTML_Exception.inc.php';
			break;

		case('PublicHTML_ExceptionHelper'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/helpers/PublicHTML_ExceptionHelper.inc.php';
			break;

		case('PublicHTML_ExceptionPage'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/pages/PublicHTML_ExceptionPage.inc.php';
			break;

		case('PublicHTML_ExceptionRenderer'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/renderers/PublicHTML_ExceptionRenderer.inc.php';
			break;

		case('PublicHTML_GDPNGImage'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/pages/png/PublicHTML_GDPNGImage.inc.php';
			break;

		case('PublicHTML_HaddockHTTPResponse'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/pages/PublicHTML_HaddockHTTPResponse.inc.php';
			break;

		case('PublicHTML_HTMLPage'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/pages/PublicHTML_HTMLPage.inc.php';
			break;

		case('PublicHTML_HTTPResponse'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/PublicHTML_HTTPResponse.inc.php';
			break;

		case('PublicHTML_HTTPResponseWithMessageBody'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/pages/PublicHTML_HTTPResponseWithMessageBody.inc.php';
			break;

		case('PublicHTML_IncludesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/PublicHTML_IncludesDirectory.inc.php';
			break;

		case('PublicHTML_JavaScriptPage'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/pages/PublicHTML_JavaScriptPage.inc.php';
			break;

		case('PublicHTML_PageDirectory'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/PublicHTML_PageDirectory.inc.php';
			break;

		case('PublicHTML_PageManager'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/PublicHTML_PageManager.inc.php';
			break;

		case('PublicHTML_PageNotFoundException'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/exceptions/PublicHTML_PageNotFoundException.inc.php';
			break;

		case('PublicHTML_PagesDirectory'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/PublicHTML_PagesDirectory.inc.php';
			break;

		case('PublicHTML_PCROFactory'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/PublicHTML_PCROFactory.inc.php';
			break;

		case('PublicHTML_PNGImage'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/pages/png/PublicHTML_PNGImage.inc.php';
			break;

		case('PublicHTML_ProjectRootDotHTAcessFileTests'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/unit-tests/PublicHTML_ProjectRootDotHTAcessFileTests.inc.php';
			break;

		case('PublicHTML_ProjectSpecificHTMLPageClassesHelper'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/helpers/PublicHTML_ProjectSpecificHTMLPageClassesHelper.inc.php';
			break;

		case('PublicHTML_PublicURLFactory'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/PublicHTML_PublicURLFactory.inc.php';
			break;

		case('PublicHTML_RedirectionHelper'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/helpers/PublicHTML_RedirectionHelper.inc.php';
			break;

		case('PublicHTML_RedirectionManager'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/PublicHTML_RedirectionManager.inc.php';
			break;

		case('PublicHTML_RedirectScript'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/pages/PublicHTML_RedirectScript.inc.php';
			break;

		case('PublicHTML_RestrictAccessToDirectoryOnTheServerCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/cli-scripts/PublicHTML_RestrictAccessToDirectoryOnTheServerCLIScript.inc.php';
			break;

		case('PublicHTML_ServerAccessControlHelper'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/helpers/PublicHTML_ServerAccessControlHelper.inc.php';
			break;

		case('PublicHTML_ServerAddressesHelper'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/helpers/PublicHTML_ServerAddressesHelper.inc.php';
			break;

		case('PublicHTML_ServerAddressTests'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/unit-tests/PublicHTML_ServerAddressTests.inc.php';
			break;

		case('PublicHTML_ServerAddressValidator'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/input-validation/PublicHTML_ServerAddressValidator.inc.php';
			break;

		case('PublicHTML_ServerCapabilitiesHelper'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/helpers/PublicHTML_ServerCapabilitiesHelper.inc.php';
			break;

		case('PublicHTML_SetServerAddressCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/cli-scripts/PublicHTML_SetServerAddressCLIScript.inc.php';
			break;

		case('PublicHTML_ShowServerAddressCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/cli-scripts/PublicHTML_ShowServerAddressCLIScript.inc.php';
			break;

		case('PublicHTML_URLFactory'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/url-factories/PublicHTML_URLFactory.inc.php';
			break;

		case('PublicHTML_URLHelper'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/helpers/PublicHTML_URLHelper.inc.php';
			break;

		case('PublicHTML_VHostTests'): 
			require_once PROJECT_ROOT . '/haddock/public-html/classes/unit-tests/PublicHTML_VHostTests.inc.php';
			break;

		case('RSS_AtomSimpleXMLElement'): 
			require_once PROJECT_ROOT . '/plug-ins/rss/classes/RSS_AtomSimpleXMLElement.inc.php';
			break;

		case('RSS_BBCSportRSSStartPageWidget'): 
			require_once PROJECT_ROOT . '/plug-ins/rss/classes/example-widgets/RSS_BBCSportRSSStartPageWidget.inc.php';
			break;

		case('RSS_BrightonWokDiaryRSSStartPageWidget'): 
			require_once PROJECT_ROOT . '/plug-ins/rss/classes/example-widgets/RSS_BrightonWokDiaryRSSStartPageWidget.inc.php';
			break;

		case('RSS_RSS'): 
			require_once PROJECT_ROOT . '/plug-ins/rss/classes/RSS_RSS.inc.php';
			break;

		case('RSS_RSSHelper'): 
			require_once PROJECT_ROOT . '/plug-ins/rss/classes/RSS_RSSHelper.inc.php';
			break;

		case('RSS_RSSSimpleXMLElement'): 
			require_once PROJECT_ROOT . '/plug-ins/rss/classes/RSS_RSSSimpleXMLElement.inc.php';
			break;

		case('RSS_RSSStartPageWidget'): 
			require_once PROJECT_ROOT . '/plug-ins/rss/classes/RSS_RSSStartPageWidget.inc.php';
			break;

		case('RSS_SimpleXMLElement'): 
			require_once PROJECT_ROOT . '/plug-ins/rss/classes/RSS_SimpleXMLElement.inc.php';
			break;

		case('Security_PasswordGenerator'): 
			require_once PROJECT_ROOT . '/haddock/security/classes/Security_PasswordGenerator.inc.php';
			break;

		case('Strings_Converter'): 
			require_once PROJECT_ROOT . '/haddock/strings/classes/Strings_Converter.inc.php';
			break;

		case('Strings_Describer'): 
			require_once PROJECT_ROOT . '/haddock/strings/classes/Strings_Describer.inc.php';
			break;

		case('Strings_FilteringHelper'): 
			require_once PROJECT_ROOT . '/haddock/strings/classes/helpers/Strings_FilteringHelper.inc.php';
			break;

		case('Strings_SimpleFilters'): 
			require_once PROJECT_ROOT . '/haddock/strings/classes/Strings_SimpleFilters.inc.php';
			break;

		case('Strings_Splitter'): 
			require_once PROJECT_ROOT . '/haddock/strings/classes/Strings_Splitter.inc.php';
			break;

		case('Strings_SplittingHelper'): 
			require_once PROJECT_ROOT . '/haddock/strings/classes/helpers/Strings_SplittingHelper.inc.php';
			break;

		case('UnitTests_CreateUnitTestsClassCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/unit-tests/classes/cli-scripts/UnitTests_CreateUnitTestsClassCLIScript.inc.php';
			break;

		case('UnitTests_ListAllUnitTestsCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/unit-tests/classes/cli-scripts/UnitTests_ListAllUnitTestsCLIScript.inc.php';
			break;

		case('UnitTests_RunAllTestsCLIScript'): 
			require_once PROJECT_ROOT . '/haddock/unit-tests/classes/cli-scripts/UnitTests_RunAllTestsCLIScript.inc.php';
			break;

		case('UnitTests_TestResult'): 
			require_once PROJECT_ROOT . '/haddock/unit-tests/classes/UnitTests_TestResult.inc.php';
			break;

		case('UnitTests_TestResultsSet'): 
			require_once PROJECT_ROOT . '/haddock/unit-tests/classes/UnitTests_TestResultsSet.inc.php';
			break;

		case('UnitTests_TestsHelper'): 
			require_once PROJECT_ROOT . '/haddock/unit-tests/classes/helpers/UnitTests_TestsHelper.inc.php';
			break;

		case('UnitTests_UnitTests'): 
			require_once PROJECT_ROOT . '/haddock/unit-tests/classes/UnitTests_UnitTests.inc.php';
			break;

		case('UnitTests_UnitTestsClassesHelper'): 
			require_once PROJECT_ROOT . '/haddock/unit-tests/classes/helpers/UnitTests_UnitTestsClassesHelper.inc.php';
			break;

		case('UnitTests_UnitTestsClassNameValidator'): 
			require_once PROJECT_ROOT . '/haddock/unit-tests/classes/input-validation/UnitTests_UnitTestsClassNameValidator.inc.php';
			break;

		case('UnitTests_UnitTestsPHPClassFile'): 
			require_once PROJECT_ROOT . '/haddock/unit-tests/classes/UnitTests_UnitTestsPHPClassFile.inc.php';
			break;
		
	}
}

?>
