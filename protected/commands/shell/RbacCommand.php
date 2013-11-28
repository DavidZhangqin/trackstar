<?php

class RbacCommand extends CConsoleCommand {

    private $_authManager;

    public function getHelp() {
        return <<<EOD
USAGE
    rbac
DESCRIPTION
    This command generates an initial RBAC authorization hierarchy.
EOD;
    }

    public function run($args) {
        if(($this->_authManager=Yii::app()->authManager) === null) {
            echo "Error: an authorization manager, named 'authManager' must be configured to use this command.\n";
            echo "If you already added 'authManager' component in application configuration,\n";
            echo "please quit and re-enter the yiic shell.\n";
            return;
        }
        echo "This command will create three roles: Owner, Member, and Reader and the following permissions:\n";
        echo "create, read, update and delete user\n";
        echo "create, read, update and delete project\n";
        echo "create, read, update and delete issue\n";
        echo "Would you like to continue? [Yes|No] ";

        if(!strncasecmp(trim(fgets(STDIN)), 'y', 1)) {
            $this->_authManager->clearAll();

            $this->_authManager->createOperation("createUser", "create a new user");
            $this->_authManager->createOperation("readUser", "read user profile information");
            $this->_authManager->createOperation("updateUser", "update a users' information");
            $this->_authManager->createOperation("deleteUser", "remove a users' from a project");

            $this->_authManager->createOperation("createProject", "create a new project");
            $this->_authManager->createOperation("readProject", "read project information");
            $this->_authManager->createOperation("updateProject", "update project information");
            $this->_authManager->createOperation("deleteProject", "delete a project");

            $this->_authManager->createOperation("createIssue", "create a new issue");
            $this->_authManager->createOperation("readIssue", "read issue information");
            $this->_authManager->createOperation("updateIssue", "update a issue information");
            $this->_authManager->createOperation("deleteIssue", "delete a issue");

            $role = $this->_authManager->createRole("reader");
            $role->addChild("readUser");
            $role->addChild("readProject");
            $role->addChild("readIssue");

            $role = $this->_authManager->createRole("member");
            $role->addChild("reader");
            $role->addChild("createIssue");
            $role->addChild("updateIssue");
            $role->addChild("deleteIssue");

            $role = $this->_authManager->createRole("owner");
            $role->addChild("reader");
            $role->addChild("member");
            $role->addChild("createUser");
            $role->addChild("updateUser");
            $role->addChild("deleteUser");
            $role->addChild("createProject");
            $role->addChild("updateProject");
            $role->addChild("deleteProject");

            $this->_authManager->createTask("adminManagement", "access to the application administration functionality");
            $role=$this->_authManager->createRole("admin");
            $role->addChild("owner");
            $role->addChild("reader");
            $role->addChild("member");
            $role->addChild("adminManagement");
            $this->_authManager->assign("admin",7);

            echo "Authorization hierarchy successfully generated.";
        }
    }

}