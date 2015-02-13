interview-vimeo
================

## Installation

###Linux Packages

The following packages are needed to be installed:

```
# LAMP (with MariaDB, and phpmyadmin):
sudo apt-get install apache2
sudo apt-get install mariadb-server mariadb-client
sudo apt-get install php5 libapache2-mod-php5
sudo apt-get install phpmyadmin
```

## Configuration

###GIT

Fork this project in your GitHub account, then clone your repository:

```
cd /var/www/html/
sudo git clone https://[YOUR-USERNAME]@github.com/[YOUR-USERNAME]/interview-vimeo.git
```

Then, change the *file permissions* for the entire project by issuing the command:

```
cd /var/www/html/
sudo chown -R jeffrey:sudo interview-vimeo
```

**Note:** change 'jeffrey' to the user account YOU use.

Then, add the *Remote Upstream*, this way we can pull any merged pull-requests:

```
cd /var/www/html/interview-vimeo/
git remote add upstream https://github.com/[YOUR-USERNAME]/interview-vimeo.git
```

####GIT Submodule

We need to initialize our git *submodules*:

```
sudo git submodule init
sudo git submodule update
```

The above two commands will update submodules within the cloned repository, according to the versioned master branch. If they are already initialized in the cloned repository, then the latter command will suffice.

The following updates submodule(s):

```
cd /var/www/htmls/interview-vimeo/
git checkout -b NEW_BRANCH master
cd [YOUR_SUBMODULE]/
git checkout master
git pull
cd ../
git status
```

to the latest code-base, within the cloned repository branch, `NEW_BRANCH`.
