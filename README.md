interview-vimeo
================

This following coding exercise was given to me when I applied for a *Software Engineer* (Video Player) position at [Vimeo](https://vimeo.com/). When I submitted the code, I had forgotten to write *exception* cases, if the sample file could not be read, or if the output file(s) could not be written out.

##Exercise

Your job is to write code that will load in [`sample.csv`](https://github.com/jeff1evesque/interview-vimeo/blob/master/data/sample.csv) and analyze the data against the rules listed below. Your code should output the results into two files; `valid.csv` will contain a list of clip_ids's that passed the tests and `invalid.csv` will contain a list of clip_id's that failed the tests. Requirements are to use PHP (You can use Python if you want), utilize the SPL FilterIterator (or any other standard library, for Python), and handle exceptions if a file cannot be read in or written to.

**Rules:**

- The clip must be public (privacy == anybody)
- The clip must have over 10 likes and over 200 plays
- The clip title must be under 30 characters

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

Note: This project assumes [Ubuntu Server 14.04](http://www.ubuntu.com/download/server) as the operating system. If using another system, adjust the above download requirements.

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
