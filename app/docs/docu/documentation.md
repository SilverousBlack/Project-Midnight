<!-- markdownlint-disable MD033 -->

<style>
    h1 {
        text-align: center;
    }
    p {
        text-align: justify;
        text-justify: inter-word;
    }
</style>

# Documentation

This document shows the documentation of Project Midnight.

## Table of Contents

- [Documentation](#documentation)
  - [Table of Contents](#table-of-contents)
  - [0.0 Meta Information](#00-meta-information)
    - [0.1 Filesystem](#01-filesystem)
    - [0.2 Repository Information](#02-repository-information)
    - [0.3 Version Information](#03-version-information)
    - [0.4 Licenses](#04-licenses)
    - [0.5 Developer Notes](#05-developer-notes)
    - [0.6 Development Status](#06-development-status)
  - [1.0 Source files and Code Works](#10-source-files-and-code-works)
    - [1.1 `db_config.php`](#11-db_configphp)
    - [1.2 `requiries.php`](#12-requiriesphp)
    - [1.3 `protocols.php`](#13-protocolsphp)
    - [1.4 `session.php`](#14-sessionphp)
    - [1.5 `logout.php`](#15-logoutphp)
    - [1.6 `midnight.sql`](#16-midnightsql)
    - [1.7 `login.php`](#17-loginphp)
    - [1.8 `signup.php`](#18-signupphp)
    - [1.9 `retrieve.php`](#19-retrievephp)
    - [1.10 `profile.php`](#110-profilephp)
    - [1.11 `manage.php`](#111-managephp)
    - [1.12 `live.php`](#112-livephp)
    - [1.13 `db.php`](#113-dbphp)
  - [2.0 Runtime and Technical Captures](#20-runtime-and-technical-captures)
    - [2.1 Log In Page](#21-log-in-page)
    - [2.2 Sign Up Page](#22-sign-up-page)
    - [2.3 Account Retrieval Page](#23-account-retrieval-page)
    - [2.4 Profile Management Page [Local]](#24-profile-management-page-local)
    - [2.5 Profile Management Page [Admin]](#25-profile-management-page-admin)
    - [2.6 Cipher Management Page [Local]](#26-cipher-management-page-local)
    - [2.7 Cipher Management Page [Admin]](#27-cipher-management-page-admin)
    - [2.8 Live Cipher Engine Page [Local]](#28-live-cipher-engine-page-local)
    - [2.9 Live Cipher Engine Page [Admin]](#29-live-cipher-engine-page-admin)
    - [2.10 Database Server Page [Local]](#210-database-server-page-local)
    - [2.11 Database Server Page [Admin]](#211-database-server-page-admin)
    - [2.12 Database Structure](#212-database-structure)
  - [3.0 System Design](#30-system-design)
    - [3.1 Entity Relationship Diagram](#31-entity-relationship-diagram)
    - [3.2 ID Characterics and Symbolic Cipher Process](#32-id-characterics-and-symbolic-cipher-process)
    - [3.3 Data Flow Diagram (Level 0)](#33-data-flow-diagram-level-0)

## 0.0 Meta Information

### 0.1 Filesystem

This represents the filesystem of Project Midnight. Refer to this section for information on how locations.

```bash
+---+ app
|   +---+ docs
|   |   +---+ docu
|   |   |   +---> documentation.md
|   |   |   +---> documentation.pdf
|   |   |   +---> ... <misc files> ...
|   |   +---+ Third Party Licenses
|   |   |   +---> index.md
|   |   |   +---> index.pdf
|   |   |   +---> OFL.txt
|   |   +---+ System Design
|   |   |   +---> ... <system design files> ...
|   |   +---> Enthereon Cipher Projects.md
|   |   +---> Enthereon Cipher Projects.pdf
|   |   +---> LICENSE
|   |   +---> Project Midnight.md
|   |   +---> Project Midnight.pdf
|   |   +---> System Design.vsdx
|   +---+ src
|   |   +---+ .sys
|   |   |   +---+ logic
|   |   |   |   +---> db_config.php
|   |   |   |   +---> logout.php
|   |   |   |   +---> protocols.php
|   |   |   |   +---> requiries.php
|   |   |   |   +---> session.php
|   |   |   +---+ meta
|   |   |   |   +---> midnight.sql
|   |   +---+ pages
|   |   |   +---> db.php
|   |   |   +---> live.php
|   |   |   +---> login.php
|   |   |   +---> manage.php
|   |   |   +---> profile.php
|   |   |   +---> retrieve.php
|   |   |   +---> signup.php
|   |   +---+ resources
|   |   |   +---+ fonts
|   |   |   |   +---+ static
|   |   |   |   |   +---> ... <misc font files> ...
|   |   |   |   +---> BodyFont.ttf
|   |   |   |   +---> HeaderFont.ttf
|   |   |   +---+ images
|   |   |   |   +---> banner logo large.png
|   |   |   |   +---> banner logo medium.png
|   |   |   |   +---> icon-16.png
|   |   |   |   +---> icon-32.png
|   |   |   |   +---> icon-64.png
|   |   |   |   +---> icon-128.png
|   |   |   |   +---> icon-256.png
|   |   |   +---> ... <misc work files> ...
|   |   +---+ scripts
|   |   |   +---+ css
|   |   |   |   +---> basic.css
|   |   |   |   +---> onboard.css
|   |   |   +---+ js
|   +---> index.php
|   +---> launchserver.bat
|   +---> launchsys.bat
+---> .gitattributes
+---> .gitignore
+---> LICENSE
+---> README.md
```

### 0.2 Repository Information

- Author: [@SilverousBlack](github.com/SilverousBlack)
- Repository Host: [GitHub](github.com)
- Repository Name: [Project Midnight](github.com/SilverousBlack/Project-Midnight)
- Repository Status: **Private**
- Repository Version: 0.0.2
- License: [Enthereon Cipher Projects General License](../../../LICENSE)

### 0.3 Version Information

- 0.0.1 - Repository Launch with Log In and Sign Up capabilities
- 0.0.2 - System Timeouts, Administrator-only Control

### 0.4 Licenses

This Software licensed with a **Enthereon Cipher Projects General License**.

```bash
Enthereon Cipher Projects General License

Copyright (c) 2020 Julian Caleb Segundo (SilverousBlack)

Permission is hereby granted, free of charge, to any person 
(the "User") obtaining a copy of this software and associated 
documentation files (the "Software"), to deal in the Software 
without restriction, including without limitation of the 
rights to use, copy, modify, merge, publish, distribute, 
sublicense, and/or sell copies of the Software, and to permit 
persons to whom the Software is furnished to do so, subject to 
the following conditions:

The above copyright notice and this permission notice shall be 
included in all copies or substantial portions of the Software.

The use of the Software subjects the User to liability of usage, 
including any damage to property and/or data.

The Software must not be used to infringe any rights and/or 
damage any form of property and/or data.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, 
EXPRESSED OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE 
WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE 
AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT 
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, 
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING 
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR 
OTHER DEALINGS IN THE SOFTWARE.

THE USE OF THE SOFTWARE SUBJECTS THE USER TO COMPONENT COPYRIGHTS 
AGREEMENTS THEREOF, OF WHICH DEFINES THEIR OWN TERMS OF USE AND 
LICENSE. IN NO EVENT MUST THE USER TERMINATE THESE TERMS, AND IN 
SUCH EVENT THE AUTHORS OR COPYRIGHT HOLDERS ARE NOT LIABLE TO 
INFRINGEMENT OF ANY KIND. IN NO EVENT SHALL THE AUTHORS OR 
COPYRIGHT HOLDERS BE LIABLE ANY LOSS OR DAMAGE TO PROPERTY AND/OR 
DATA WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING 
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR 
OTHER DEALINGS IN THE SOFTWARE.

This license shall be rendered null and void if any of the above,
whether as a whole or partial, are not met. This agreement also
include clauses of component licenses. Upon termination of
agreement the User must destroy/erase/remove all and any parts of
the Software from their device, this includes any component that
has been acquired solely through the Software. If the User fails
to destroy/erase/remove all and any parts of the Software, they
are subject to copyright infringement of both the Software and its
distributed components.
```

The fonts used in this software, `Manrope` and `Space Grotesk` is licensed with **SIL Open Font License**.

```txt
Copyright 2020 The Manrope Project Authors (https://github.com/sharanda/manrope)
Copyright 2020 The Space Grotesk Project Authors (https://github.com/floriankarsten/space-grotesk)

This Font Software is licensed under the SIL Open Font License, Version 1.1.
This license is copied below, and is also available with a FAQ at:
http://scripts.sil.org/OFL


-----------------------------------------------------------
SIL OPEN FONT LICENSE Version 1.1 - 26 February 2007
-----------------------------------------------------------

PREAMBLE
The goals of the Open Font License (OFL) are to stimulate worldwide
development of collaborative font projects, to support the font creation
efforts of academic and linguistic communities, and to provide a free and
open framework in which fonts may be shared and improved in partnership
with others.

The OFL allows the licensed fonts to be used, studied, modified and
redistributed freely as long as they are not sold by themselves. The
fonts, including any derivative works, can be bundled, embedded, 
redistributed and/or sold with any software provided that any reserved
names are not used by derivative works. The fonts and derivatives,
however, cannot be released under any other type of license. The
requirement for fonts to remain under this license does not apply
to any document created using the fonts or their derivatives.

DEFINITIONS
"Font Software" refers to the set of files released by the Copyright
Holder(s) under this license and clearly marked as such. This may
include source files, build scripts and documentation.

"Reserved Font Name" refers to any names specified as such after the
copyright statement(s).

"Original Version" refers to the collection of Font Software components as
distributed by the Copyright Holder(s).

"Modified Version" refers to any derivative made by adding to, deleting,
or substituting -- in part or in whole -- any of the components of the
Original Version, by changing formats or by porting the Font Software to a
new environment.

"Author" refers to any designer, engineer, programmer, technical
writer or other person who contributed to the Font Software.

PERMISSION & CONDITIONS
Permission is hereby granted, free of charge, to any person obtaining
a copy of the Font Software, to use, study, copy, merge, embed, modify,
redistribute, and sell modified and unmodified copies of the Font
Software, subject to the following conditions:

1) Neither the Font Software nor any of its individual components,
in Original or Modified Versions, may be sold by itself.

2) Original or Modified Versions of the Font Software may be bundled,
redistributed and/or sold with any software, provided that each copy
contains the above copyright notice and this license. These can be
included either as stand-alone text files, human-readable headers or
in the appropriate machine-readable metadata fields within text or
binary files as long as those fields can be easily viewed by the user.

3) No Modified Version of the Font Software may use the Reserved Font
Name(s) unless explicit written permission is granted by the corresponding
Copyright Holder. This restriction only applies to the primary font name as
presented to the users.

4) The name(s) of the Copyright Holder(s) or the Author(s) of the Font
Software shall not be used to promote, endorse or advertise any
Modified Version, except to acknowledge the contribution(s) of the
Copyright Holder(s) and the Author(s) or with their explicit written
permission.

5) The Font Software, modified or unmodified, in part or in whole,
must be distributed entirely under this license, and must not be
distributed under any other license. The requirement for fonts to
remain under this license does not apply to any document created
using the Font Software.

TERMINATION
This license becomes null and void if any of the above conditions are
not met.

DISCLAIMER
THE FONT SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO ANY WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT
OF COPYRIGHT, PATENT, TRADEMARK, OR OTHER RIGHT. IN NO EVENT SHALL THE
COPYRIGHT HOLDER BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
INCLUDING ANY GENERAL, SPECIAL, INDIRECT, INCIDENTAL, OR CONSEQUENTIAL
DAMAGES, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF THE USE OR INABILITY TO USE THE FONT SOFTWARE OR FROM
OTHER DEALINGS IN THE FONT SOFTWARE.
```

### 0.5 Developer Notes

- Due to XAMPP not properly working (installation problems).
  - PHP workaround is made through a seprate installation of PHP and Windows Batch Scripts.
  - `launchserver.bat` launches the PHP (8.0.1) Development Serverc with the system running at `localhost:8080`.
  - `launchsys.bat` launches Microsoft Edge (developer choice browser) new window with the system running at `localhost:8080`.
- By nature of the web application, `profile.php` or the *Profile Management Page* is considered as the *home page*.
- A new MySQL user is created and used by Project Midnight by default.
- This document and other documents are written in Markdown, and exported to Portable Document Format (PDF) thereunto. Exporting to PDF is done through an [extension](https://marketplace.visualstudio.com/items?itemName=yzane.markdown-pdf).

### 0.6 Development Status

- 2020 December 23 - System designed **[0.0.0]**.
- 2021 January 8 - Development Started **[0.0.0]**.
- 2021 January 9 - Database set up, including default user **[0.0.1]**.
- 2021 January 12 - Log In/Sign Up pages developed **[0.0.1]**.
- 2021 January 16 - Administrator rights implemented **[0.0.1]**.
- 2021 January 19 - Repository launched **[0.0.1]**.
- 2021 January 20 - Protocols implemented **[0.0.2]**.
- *2021 January 22* - First Packaging attempt, and submission **[0.0.2]**.
- *2021 February 4* - Open Launch **[1.0.0]**.

## 1.0 Source files and Code Works

### 1.1 `db_config.php`

```php
<?php
    $dbserver = "localhost";
    $dbuser = "user";
    $dbpword = "";
    $dbname = "MIDNIGHT";
    $dbconfig = mysqli_connect($dbserver, $dbuser, $dbpword, $dbname);
    if ($dbconfig === false) {
        $error = mysqli_connect_error();
        die("Database Connection Error: {$error}\nAlter `src/.sys/logic/db_config.php` to fix errors.");
    }
?>
```

### 1.2 `requiries.php`

```php
<?php
    include_once("db_config.php");
    function retrieveMatches(){
        global $dbconfig;
        $name = "'" . $_POST["uname"] . "'";
        $query = "SELECT * FROM USER WHERE NAME={$name}";
        $result = mysqli_query($dbconfig, $query)
        or die("Database Error: " .  mysqli_error($dbconfig));
        return mysqli_fetch_assoc($result);
    }
    function generateUserNumber($number){
        $result = "";
        if ($number < 10) $result .= "00";
        elseif ($number < 100) $result .= "0";
        elseif ($number < 1000) $result .= "";
        return $result . "{$number}";
    }
    function getUserName($name, $id, $stat){
        $astat = boolval($stat) == 1 ? 1 : 0;
        return $name . "#" . generateUserNumber($id) . $astat;
    }
    function verifyPassWord(string $target){
        $size = strlen($target);
        if ($size >= 8 && $size <= 20) return true;
        else return false;
    }
    function recordEntry($name, $word, $secq, $seca){
        global $dbconfig;
        $uven = "'" . $name . "'" . ", '" . $word . "'";
        $uent = mysqli_query($dbconfig, 
        "INSERT INTO USER(NAME, WORD) 
        VALUE ({$uven});") 
        or die("Database Error [Cannot Add Entry]: " .  mysqli_error($dbconfig));
        $retr = mysqli_query($dbconfig,
        "SELECT ID FROM USER
        WHERE NAME='{$name}';")
        or die("Database Error [Cannot Add Entry]: " .  mysqli_error($dbconfig));
        $ruid = mysqli_fetch_row($retr);
        $suid = $ruid[0];
        $sven = "'{$secq}', '{$seca}', {$suid}" ;
        $sent = mysqli_query($dbconfig,
        "INSERT INTO SECURITY(QUE, ANS, UID)
        VALUES ({$sven});")
        or die("Database Error [Cannot Add Entry]: " .  mysqli_error($dbconfig));
        $ret = array($uent, $sent);
        return $ret;
    }
    function alert(string $msg){
        echo "<script type='text/javascript'>alert('{$msg}')</script>";
    }
?>
```

### 1.3 `protocols.php`

```php
<?php
    include_once("requiries.php");
    function logoutProtocol(){
        global $dbconfig;
        mysqli_close($dbconfig);
        unset($_POST);
        unset($_SESSION);
    }
    function pageloadProtocol(){
        global $dbconfig;
        if (!(isset($_SESSION["luid"]))){
            header("Loacation: login.php", true, 301);
            exit();
        }
        else {
            $luid = $_SESSION["luid"];
            $result = mysqli_query($dbconfig,
            "SELECT * 
            FROM USER
            WHERE ID={$luid};")
            or die("Database Error: " . mysqli_error($dbconfig));
            $localResults = mysqli_fetch_assoc($result);
            $user = getUserName($localResults["NAME"], $localResults["ID"], $localResults["ASTAT"]);
            $_SESSION["uname"] = $user;
            $_SESSION["lusr"] = $localResults["NAME"];
            $_SESSION["luid"] = $localResults["ID"];
            $_SESSION["luas"] = $localResults["ASTAT"];
        }
    }
    function timeoutProtocol(){
        $cur = hrtime(true);
        $elapsed = (($cur - $_SESSION["lact"]) / 1e+9) / 60;
        if ($elapsed > 10){
            $_SESSION["alert"] = "System Timeout: Please log in again";
            header("Location: login.php", true, 301);
        }
    }
    function adminProtocol(){
        if ($_SESSION["luas"] == 0){
            $_SESSION["alert"] = "Administrator-only Page: Log in with an administrator account to access.";
            logoutProtocol();
            header("Location: login.php", true, 301);
        }
    }
    function accessProtocol(){
        if (isset($_SESSION["alert"])){
            alert($_SESSION["alert"]);
            unset($_SESSION["alert"]);
        }
    }
    function pageendProtocol(){
        $_SESSION["lact"] = hrtime(true);
    }
?>
```

### 1.4 `session.php`

```php
<?php
    include_once("db_config.php");
    include_once("requiries.php");
    include_once("protocols.php");
?>
```

### 1.5 `logout.php`

```php
<?php
    include_once("session.php");
    logoutProtocol();
    session_destroy();
    header("Location: ../../pages/login.php", true, 301);
?>
```

### 1.6 `midnight.sql`

```sql
-- Project Midnight default database setup
CREATE USER IF NOT EXISTS "user"@localhost IDENTIFIED BY "";
CREATE SCHEMA MIDNIGHT;
GRANT ALL PRIVELEGES ON MIDNIGHT.* TO "user"@localhost IDENTIFIED BY "";
USE MIDNIGHT;
CREATE TABLE `user` (
    `ID` INT(3) NOT NULL AUTO_INCREMENT,
    `NAME` VARCHAR(20) NOT NULL,
    `WORD` VARCHAR(20) NOT NULL DEFAULT '00000000',
    `ASTAT` BIT(1) NULL DEFAULT b'0',
    PRIMARY KEY (`ID`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
CREATE TABLE `cipher` (
    `ID` INT(6) NOT NULL,
    `NAME` VARCHAR(20) NOT NULL,
    `UID` INT(3) NULL DEFAULT NULL,
    PRIMARY KEY (`ID`),
    INDEX `UID` (`UID`),
    CONSTRAINT `cipher_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`ID`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
CREATE TABLE `symbol` (
    `ID` INT(13) NOT NULL,
    `SYM` VARCHAR(1) NOT NULL,
    `CID` INT(6) NULL DEFAULT NULL,
    `UID` INT(3) NULL DEFAULT NULL,
    PRIMARY KEY (`ID`),
    INDEX `CID` (`CID`),
    INDEX `UID` (`UID`),
    CONSTRAINT `symbol_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `cipher` (`ID`),
    CONSTRAINT `symbol_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `user` (`ID`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
CREATE TABLE `security` (
    `ID` INT(15) NOT NULL AUTO_INCREMENT,
    `QUE` VARCHAR(50) NOT NULL,
    `ANS` VARCHAR(50) NOT NULL,
    `UID` INT(3) NULL DEFAULT NULL,
    PRIMARY KEY (`ID`),
    INDEX `UID` (`UID`),
    CONSTRAINT `security_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`ID`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
CREATE TABLE `logs` (
    `ID` INT(15) NOT NULL AUTO_INCREMENT,
    `REC` DATETIME NOT NULL DEFAULT current_timestamp(),
    `CID` INT(6) NULL DEFAULT NULL,
    `UID` INT(3) NULL DEFAULT NULL,
    PRIMARY KEY (`ID`),
    INDEX `CID` (`CID`),
    INDEX `UID` (`UID`),
    CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `cipher` (`ID`),
    CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `user` (`ID`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
INSERT INTO USER(NAME, WORD, ASTAT) VALUES ("admin", "projectmidnightadmin", 1);
INSERT INTO SECURITY(QUE, ANS, UID) VALUES ("What is the crystal latice of Enthereon?", "Midnight Sky", 1);
```

### 1.7 `login.php`

```php
<?php
    session_start();
    include_once("../.sys/logic/session.php");
    accessProtocol();
    $error_uname = "";
    $error_pword = "";
    if (isset($_POST["uname"])) {
        $localResults;
        try {    
            $localResults = retrieveMatches();
        }
        catch (Exception $e){
            $uname = $_POST["uname"];
            $error_uname = "Username [{$uname}] not found on database!";
            header("Location: ", true, 301);
        }
        if (is_null($localResults)){
            $uname = $_POST["uname"];
            $error_uname = "Username [{$uname}] not found on database!";
            header("Location: ", true, 301);
        }
        else {
            if ($_POST["psw"] == $localResults["WORD"]){
                $user = getUserName($localResults["NAME"], $localResults["ID"], $localResults["ASTAT"]);
                $_SESSION["uname"] = $user;
                $_SESSION["lusr"] = $localResults["NAME"];
                $_SESSION["luid"] = $localResults["ID"] + 0;
                $_SESSION["luas"] = $localResults["ASTAT"];
                $_SESSION["lact"] = hrtime(true);
                unset($_POST["psw"]);
                header("Location: profile.php", true, 301);
                exit();
            }
            else {
                global $error_pword;
                $uname = $_POST["uname"];
                $error_pword = "Username [{$uname}] and Password does not match";
            }
        }
    }
    unset($_POST);
    pageendProtocol();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta author="Silverous Black">
        <meta charset="utf-8">
        <meta summary="Log In page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
        <title>Midnight: Log In</title>
        <link rel="icon" type="images/png" sizes="256x256" href="../resources/images/icon-256.png">
        <link rel="icon" type="images/png" sizes="128x128" href="../resources/images/icon-128.png">
        <link rel="icon" type="images/png" sizes="64x64" href="../resources/images/icon-64.png">
        <link rel="icon" type="images/png" sizes="32x32" href="../resources/images/icon-32.png">
        <link rel="icon" type="images/png" sizes="16x16" href="../resources/images/icon-16.png">
        <link rel="stylesheet" type="text/css" href="../scripts/css/basic.css">
    </head>
    <body>
        <ul>
            <img class="banner" src="../resources/images/banner logo medium.png" alt="Project Midnight Banner Logo Medium">
            <li><a class="active" href="">Log In</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="../../docs/Enthereon Cipher Projects.pdf">About: Enthereon Cipher Projects</a></li>
            <li><a href="../../docs/Project Midnight.pdf">About: Project Midnight</a></li>
            <li><a href="../../docs/LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Log In</h1>
                <h2>Welcome to Project Midnight <img src="../resources/images/icon-16.png"></h2>
                <p>Login to continue.</p>
                <form method="post" action="">  
                    <label for="uname"><b>Username</b></label>
                    <br>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <?php
                        echo ("<p class=error>{$error_uname}</p>");
                    ?>
                    <br>
                    <label for="psw"><b>Password</b></label>
                    <br>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <?php
                        echo ("<p class=error>{$error_pword}</p>");
                    ?>
                    <br>
                    <button class="login" type="submit" onclick>Login</button>
                    <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </form>
                <p>Not yet registered? <a href="signup.php">Sign up here.</a></p>
                <p>Lost your account? <a href="retrieve.php">Retrieve here.</a></p>
            </div>
        </div>
    </body>
</html>
```

### 1.8 `signup.php`

```php
<?php
    session_start();
    include_once("../.sys/logic/session.php");
    $error_uname = "";
    $error_pword = "";
    if (isset($_POST["uname"])){
        $pings = retrieveMatches();
        if (!(is_null($pings))){
            $uname = $_POST["uname"];
            $error_uname = "Username [{$uname}] already exists in database! Consider changing.";
        }
        else {
            if (strlen($_POST["uname"]) > 20){
                $error_uname = "Username must be a maximum of 20 characters";
            }
            elseif (!(verifyPassWord($_POST["psw"]))){
                $error_pword = "Password must be at least 8 characters and at most 20 characters.";
            }
            else {
                $ret = recordEntry($_POST["uname"], $_POST["psw"], $_POST["secq"], $_POST["seca"]);
                $localResults = retrieveMatches();
                $user = getUserName($localResults["NAME"], $localResults["ID"], $localResults["ASTAT"]);
                $_SESSION["uname"] = $user;
                $_SESSION["lusr"] = $localResults["NAME"];
                $_SESSION["luid"] = $localResults["ID"];
                $_SESSION["luas"] = boolval($localResults["ASTAT"]);
                unset($_POST["secq"]);
                unset($_POST["seca"]);
                unset($_POST["psw"]);
                header("Location: profile.php", true, 301);
            }
        }
    }
    unset($_POST);
    pageendProtocol();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta author="Silverous Black">
        <meta charset="utf-8">
        <meta summary="Sign Up page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
        <title>Midnight: Sign Up</title>
        <link rel="icon" type="images/png" sizes="256x256" href="../resources/images/icon-256.png">
        <link rel="icon" type="images/png" sizes="128x128" href="../resources/images/icon-128.png">
        <link rel="icon" type="images/png" sizes="64x64" href="../resources/images/icon-64.png">
        <link rel="icon" type="images/png" sizes="32x32" href="../resources/images/icon-32.png">
        <link rel="icon" type="images/png" sizes="16x16" href="../resources/images/icon-16.png">
        <link rel="stylesheet" type="text/css" href="../scripts/css/basic.css">
    </head>
    <body>
        <ul>
            <img class="banner" src="../resources/images/banner logo medium.png" alt="Project Midnight Banner Logo Medium">
            <li><a href="login.php">Log In</a></li>
            <li><a class="active" href="">Sign Up</a></li>
            <li><a href="../../docs/Enthereon Cipher Projects.pdf">About: Enthereon Cipher Projects</a></li>
            <li><a href="../../docs/Project Midnight.pdf">About: Project Midnight</a></li>
            <li><a href="../../docs/LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Sign Up</h1>
                <h2>Welcome to Project Midnight <img src="../resources/images/icon-16.png"></h2>
                <p>Welcome! We're glad to have you here!</p>
                <p>Complete the form to register and sign up.</p>
                <form method="post" action="">
                    <label for="uname">Username</label>
                    <br>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <br>
                    <?php
                        echo ("<p class=error>{$error_uname}</p>");
                    ?>
                    <br>
                    <label for="psw">Password</label>
                    <br>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <br>
                    <?php
                        echo ("<p class=error>{$error_pword}</p>");
                    ?>
                    <br>
                    <label for="secq">Security Question</label>
                    <br>
                    <input type="text" placeholder="Security Question" name="secq" style="width: 100%">
                    <br>
                    <p class="notice">The security question [optional] would be used later to retrieve your log in credentials in case they are lost.</p>
                    <br>
                    <label for="seca">Security Question Answer</label>
                    <br>
                    <input type="text" placeholder="Security Answer" name="seca" style="width: 100%">
                    <br>
                    <p class="notice">Take note of your security question and answer! Both must match to retrieve an account.</p>
                    <br>
                    <button class="login" type="submit" onclick>Sign Up</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                    <p>By registering, you agree to our privacy statement</p>
                </form>
                <p>Already registered? <a href="login.php">Log In here.</a></p>
            </div>
        </div>
    </body>
</html>
```

### 1.9 `retrieve.php`

```php
<?php
    session_start();
    include_once("../.sys/logic/session.php");
    if (isset($_POST["ret"])){
        $retrieve_stat = true;
        $uid = $_POST["uid"];
        $que = $_POST["secq"];
        $ans = $_POST["seca"];
        $result = mysqli_query($dbconfig,
        "SELECT * 
        FROM SECURITY
        WHERE UID={$uid};")
        or die("Database Error: " . mysqli_error($dbconfig));
        if (!($result)){
            $error_ret = "Cannot Execute Request: Cannot find security records of User with ID [#{$uid}].";
        }
        else {
            $local = mysqli_fetch_assoc($result);
            if (is_null($local)) {
                $error_ret = "Cannot Execute Request: User [#{$uid}] has null security records.";
            }
            else {
                if (!($que == $local["QUE"] && $ans == $local["ANS"])){
                    $error_ret = "Cannot Execute Request: Security records for User [#{$uid}] does not match records.";
                }
                else {
                    $result = mysqli_query($dbconfig,
                    "SELECT NAME, WORD
                    FROM USER
                    WHERE ID={$uid};")
                    or die("Database Error: " . mysqli_error($dbconfig));
                    $local = mysqli_fetch_assoc($result);
                    $ret_uname = $local["NAME"];
                    $ret_pword = $local["WORD"];
                    $ret_success = "Request Success: Account credentials for User [#{$uid}] is successful.";
                }
            }
        }
    }
    unset($_POST);
    pageendProtocol();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta author="Silverous Black">
        <meta charset="utf-8">
        <meta summary="Account Retrieval page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
        <title>Midnight: Sign Up</title>
        <link rel="icon" type="images/png" sizes="256x256" href="../resources/images/icon-256.png">
        <link rel="icon" type="images/png" sizes="128x128" href="../resources/images/icon-128.png">
        <link rel="icon" type="images/png" sizes="64x64" href="../resources/images/icon-64.png">
        <link rel="icon" type="images/png" sizes="32x32" href="../resources/images/icon-32.png">
        <link rel="icon" type="images/png" sizes="16x16" href="../resources/images/icon-16.png">
        <link rel="stylesheet" type="text/css" href="../scripts/css/basic.css">
    </head>
    <body>
        <ul>
            <img class="banner" src="../resources/images/banner logo medium.png" alt="Project Midnight Banner Logo Medium">
            <li><a href="login.php">Log In</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="../../docs/Enthereon Cipher Projects.pdf">About: Enthereon Cipher Projects</a></li>
            <li><a href="../../docs/Project Midnight.pdf">About: Project Midnight</a></li>
            <li><a href="../../docs/LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Account Retrieval</h1>
                <p>Retreive your account here!</p>
                <p>Complete the form to attempt retrieving your account.</p>
                <form method="post" action="">
                    <input type="hidden" name="ret" value="true">
                    <label for="uid">User ID</label>
                    <br>
                    <input type="number" name="uid" placeholder="User ID" required>
                    <br>
                    <p>The User ID (UID) is the first three digits of your User Tag ("#xxxx").</p>
                    <br>
                    <label for="secq">Security Question</label>
                    <br>
                    <input type="text" name="secq" placeholder="Security Question" required>
                    <br>
                    <label for="seca">Security Question Answer</label>
                    <br>
                    <input type="text" name="seca" placeholder="Security Answer" required>
                    <br>
                    <button class="login" type="submit">Retrieve</button>
                </form>
                <p>Remember your credentials? <a href="login.php">Log in here.</a></p>
                <p>Do you want to sign up? <a href="signup.php">Sign up here.</a></p>
                <?php
                    if (isset($retrieve_stat)){
                        echo "<hr>";
                        echo "<h2>Results</h2>";
                        if (isset($error_ret)){
                            echo "<p class=error>{$error_ret}</p>";
                        }
                        else {
                            echo "<p class=success>{$ret_success}</p>";
                            echo "<p class=warning>Quickly take note of your credentials. We are not liable for any leak of information.</p>";
                            echo "<form>";
                            echo "<label>User Name</label><br>";
                            echo "<input type=text type=value value='{$ret_uname}' readonly><br>";
                            echo "<label>Password</label><br>";
                            echo "<input type=text value='{$ret_pword}' readonly>";
                            unset($retrive_stat);
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>
```

### 1.10 `profile.php`

```php
<?php
    session_start();
    include_once("../.sys/logic/session.php");
    pageloadProtocol();
    timeoutProtocol();
    if (isset($_POST["unc"])){
        $localresults = retrieveMatches();
        $uname = $_POST["uname"];
        if (is_null($localresults)){
            $luid = $_SESSION["luid"];
            $buffer = "'" . $uname . "'";
            $result = mysqli_query($dbconfig,
            "UPDATE USER 
            SET NAME={$buffer}
            WHERE ID={$luid};")
            or die("Database Error: " . mysqli_error($dbconfig));
            $user = getUserName($uname, $luid, $_SESSION["luas"]);
            $_SESSION["uname"] = $user;
            $_SESSION["lusr"] = $uname;
            $success_uname = "Request Success: User Name successfully changed.";
        }
        else {
            if ($uname == $_SESSION["lusr"]){
                $error_cname = "Cannot Execute Request: New User Name [$uname] is similar to current.";
            }
            else {
                $error_cname = "Cannot Execute Request: New User Name [$uname] has a duplicate.";
            }
        }
        unset($_POST["unc"]);
    }
    if (isset($_POST["pwc"])){
        $luid = $_SESSION["luid"];
        $buffer = mysqli_query($dbconfig,
        "SELECT *
        FROM USER
        WHERE ID={$luid};")
        or die("Database Error: " . mysqli_error($dbconfig));
        $chunk = mysqli_fetch_assoc($buffer);
        if ($_POST["opsw"] != $chunk["WORD"]) {
            $error_opsw = "Cannot Execute Request: Old password does not match record.";
        }
        elseif ($_POST["npsw"] == $chunk["WORD"]) {
            $error_npsw = "Cannot Execute Request: New password is similar to current.";
        }
        elseif ($_POST["npsw"] != $_POST["cpsw"]) {
            $error_cpsw = "Cannot Execute Request: Passwords do not match.";
        }
        else {
            $load = "'" . $_POST["npsw"] . "'";
            $result = mysqli_query($dbconfig,
            "UPDATE USER 
            SET WORD={$load}
            WHERE ID={$luid};")
            or die("Database Error: " . mysqli_error($dbconfig));
            $success_pword = "Request Success: Password successfully changed.";
        }
        unset($_POST["pwc"]);
    }
    if (isset($_POST["secc"])){
        $luid = $_SESSION["luid"];
        $secq = "'" . $_POST["secq"] . "'";
        $seca = "'" . $_POST["seca"] . "'";
        $result = mysqli_query($dbconfig,
        "UPDATE SECURITY
        SET QUE={$secq}, ANS={$seca}
        WHERE UID={$luid};")
        or die("Database Error: " . mysqli_error($dbconfig));
        $success_security = "Request Success: Security details successfully changed.";
        unset($_POST["secc"]);
    }
    unset($_POST);
    pageendProtocol();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta author="Silverous Black">
        <meta charset="utf-8">
        <meta summary="Profile Management page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
        <title>Midnight: Log In</title>
        <link rel="icon" type="images/png" sizes="256x256" href="../resources/images/icon-256.png">
        <link rel="icon" type="images/png" sizes="128x128" href="../resources/images/icon-128.png">
        <link rel="icon" type="images/png" sizes="64x64" href="../resources/images/icon-64.png">
        <link rel="icon" type="images/png" sizes="32x32" href="../resources/images/icon-32.png">
        <link rel="icon" type="images/png" sizes="16x16" href="../resources/images/icon-16.png">
        <link rel="stylesheet" type="text/css" href="../scripts/css/basic.css">
        <link rel="stylesheet" type="text/css" href="../scripts/css/onboard.css">
    </head>
    <body>
        <ul>
            <img class="banner" src="../resources/images/banner logo medium.png" alt="Project Midnight Banner Logo Medium">
            <li><a class="active" href="">Manage Profile</a></li>
            <li><a href="manage.php">Manage Ciphers</a></li>
            <li><a href="live.php">Live Cipher</a></li>
            <?php
                if ($_SESSION["luas"] == 1){
                    echo "<li><a class='adminoff' href=db.php>Database Server</a></li>";
                }
            ?>
            <li><a href="../.sys/logic/logout.php" class="logout">Log Out</a></li>
            <li><a href="../../docs/Enthereon Cipher Projects.pdf">About: Enthereon Cipher Projects</a></li>
            <li><a href="../../docs/Project Midnight.pdf">About: Project Midnight</a></li>
            <li><a href="../../docs/LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Profile Management</h1>
                <p>Hi <b><?php echo $_SESSION["uname"]; ?></b>! You can change usernames, passwords and others here!</p>
                <hr>
                <h2>User Name</h2>
                <?php
                    if (isset($success_uname)){
                        echo "<p class=success>{$success_uname}</p>";
                    }
                ?>
                <form method="post" action="">
                    <input type="hidden" name="unc" value="true">
                    <label for="uname">New User Name</label>
                    <br>
                    <input type="text" name="uname" placeholder="New User Name" value="<?php echo $_SESSION["lusr"]; ?>" required>
                    <?php
                        if (isset($error_cname)){
                            echo "<br>";
                            echo "<p class=error>{$error_cname}</p>";
                        }
                    ?>
                    <br>
                    <button class="login" type="submit" onclick>Change User Name</button>
                </form>
                <hr>
                <h2>Password</h2>
                <?php
                    if (isset($success_pword)){
                        echo "<p class=success>{$success_pword}</p>";
                    }
                    if ($_SESSION["luas"] == 1){
                        echo "<p class=notice>It is advised to keep administrator credentials constant.</p>";
                    }
                ?>
                <form method="post" action="">
                    <input type="hidden" name="pwc" value="true">
                    <label for="opsw">Old Password</label>
                    <br>
                    <input type="password" name="opsw" placeholder="Old Password" required>
                    <?php
                        if (isset($error_opsw)){
                            echo "<br>";
                            echo "<p class=error>{$error_opsw}</p>";
                        }
                    ?>
                    <br>
                    <label for="npsw">New Password</label>
                    <br>
                    <input type="password" name="npsw" placeholder="New Password" required>
                    <?php
                        if (isset($error_npsw)){
                            echo "<br>";
                            echo "<p class=error>{$error_npsw}</p>";
                        }
                    ?>
                    <br>
                    <label for="cpsw">Confirm Password</label>
                    <br>
                    <input type="password" name="cpsw" placeholder="Confirm Password" required>
                    <?php
                        if (isset($error_cpsw)){
                            echo "<br>";
                            echo "<p class=error>{$error_cpsw}</p>";
                        }
                    ?>
                    <br>
                    <button class="login" type="submit" onclick>Change Password</button>
                </form>
                <hr>
                <h2>Security Details</h2>
                <?php
                    if (isset($success_security)){
                        echo "<p class=success>{$success_security}</p>";
                    }
                ?>
                <form method="post" action="">
                    <input type="hidden" name="secc" value="true">
                    <label for="npsw">Security Question</label>
                    <br>
                    <input type="text" name="secq" placeholder="New Security Question">
                    <br>
                    <label for="cpsw">Security Answer</label>
                    <br>
                    <input type="text" name="seca" placeholder="New Security Answer">
                    <br>
                    <button class="login" type="submit" onclick>Change Security Details</button>
                </form>
            </div>
        </div>
    </body>
</html>
```

### 1.11 `manage.php`

```php
<?php
    session_start();
    include_once("../.sys/logic/session.php");
    pageloadProtocol();
    timeoutProtocol();
    alert("Page Under Construction: This page is still in development, all/multiple functionalities may be missing.");
    $luid = $_SESSION["luid"] + 0;
    $result = mysqli_query($dbconfig,
    "SELECT *
    FROM CIPHER
    WHERE UID={$luid}")
    or die("Database Error: " . mysqli_error($dbconfig));
    $copy = $result;
    $total = 0;
    $counter = 1;
    while($rows = mysqli_fetch_assoc($result)){
        $total += 1;
        $counter = ($rows["ID"] + 0) - ($luid * 1000);
    }
    if (isset($_POST["cnp"])){
        $lcin = "'" . $_POST["ncn"] . "'";
        $lcid = ($luid * 1000) + $counter + 1;
        $result = mysqli_query($dbconfig,
        "INSERT INTO
        CIPHER(ID, NAME, UID)
        VALUES ({$lcid}, {$lcin}, {$luid});")
        or die("Database Error" . mysqli_error($dbconfig));
    }
    if (isset($_POST["ccn"])){

    }
    else {
        $options = "";

    }
    pageendProtocol();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta author="Silverous Black">
        <meta charset="utf-8">
        <meta summary="Cipher Management page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
        <title>Midnight: Log In</title>
        <link rel="icon" type="images/png" sizes="256x256" href="../resources/images/icon-256.png">
        <link rel="icon" type="images/png" sizes="128x128" href="../resources/images/icon-128.png">
        <link rel="icon" type="images/png" sizes="64x64" href="../resources/images/icon-64.png">
        <link rel="icon" type="images/png" sizes="32x32" href="../resources/images/icon-32.png">
        <link rel="icon" type="images/png" sizes="16x16" href="../resources/images/icon-16.png">
        <link rel="stylesheet" type="text/css" href="../scripts/css/basic.css">
        <link rel="stylesheet" type="text/css" href="../scripts/css/onboard.css">
    </head>
    <body>
        <ul>
            <img class="banner" src="../resources/images/banner logo medium.png" alt="Project Midnight Banner Logo Medium">
            <li><a href="profile.php">Manage Profile</a></li>
            <li><a class="active" href="">Manage Ciphers</a></li>
            <li><a href="live.php">Live Cipher</a></li>
            <?php
                if ($_SESSION["luas"] == 1){
                    echo "<li><a class='adminoff' href=db.php>Database Server</a></li>";
                }
            ?>
            <li><a href="../.sys/logic/logout.php" class="logout">Log Out</a></li>
            <li><a href="../../docs/Enthereon Cipher Projects.pdf">About: Enthereon Cipher Projects</a></li>
            <li><a href="../../docs/Project Midnight.pdf">About: Project Midnight</a></li>
            <li><a href="../../docs/LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Cipher Management<h2>
                <p>Manage your ciphers here!</p>
                <hr>
                <h2>Create New Cipher<h2>
                <form method="POST" action="">
                    <input type="hidden" name="cnp">
                    <label for="ncn">New Cipher Name</label>
                    <br>
                    <input type="text" name="ncn" placeholder="Cipher Name" required>
                    <button type="submit" class="login">&rArr;</button>
                    <?php
                        if(isset($error_ncn)){
                            echo "<br><p class='error'>{$ncn}</p>";
                        }
                    ?>
                </form>
                <hr>
                <h2>Configure Cipher</h2>
                <p>Select a ciphher &rArr; Select a configuration method &rArr; Do configuration</p>
                <form>
                    <label for="ccn">Cipher Name</label>
                    <br>
                    <?php
                        if(isset($cur_cipher)){
                            echo "<input type='text' name='ccn' value='{$cur_cipher}' readonly>";
                        }
                        else {
                            echo "<select name='ccn' required>";
                            echo $options;
                            echo "</select>";
                            echo "<button type='submit' class='login'>&rArr;</button>\n";
                        }
                    ?>
                    <br>
                </form>
            </div>
        </div>
    </body>
</html>
```

### 1.12 `live.php`

```php
<?php
    session_start();
    include_once("../.sys/logic/session.php");
    pageloadProtocol();
    timeoutProtocol();
    alert("Page Under Construction: This page is still in development, all/multiple functionalities may be missing.");
    pageendProtocol();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta author="Silverous Black">
        <meta charset="utf-8">
        <meta summary="Live Cipher Engine page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
        <title>Midnight: Log In</title>
        <link rel="icon" type="images/png" sizes="256x256" href="../resources/images/icon-256.png">
        <link rel="icon" type="images/png" sizes="128x128" href="../resources/images/icon-128.png">
        <link rel="icon" type="images/png" sizes="64x64" href="../resources/images/icon-64.png">
        <link rel="icon" type="images/png" sizes="32x32" href="../resources/images/icon-32.png">
        <link rel="icon" type="images/png" sizes="16x16" href="../resources/images/icon-16.png">
        <link rel="stylesheet" type="text/css" href="../scripts/css/basic.css">
        <link rel="stylesheet" type="text/css" href="../scripts/css/onboard.css">
    </head>
    <body>
        <ul>
            <img class="banner" src="../resources/images/banner logo medium.png" alt="Project Midnight Banner Logo Medium">
            <li><a href="profile.php">Manage Profile</a></li>
            <li><a href="manage.php">Manage Ciphers</a></li>
            <li><a class="active" href="">Live Cipher</a></li>
            <?php
                if ($_SESSION["luas"] == 1){
                    echo "<li><a class='adminoff' href=db.php>Database Server</a></li>";
                }
            ?>
            <li><a href="../.sys/logic/logout.php" class="logout">Log Out</a></li>
            <li><a href="../../docs/Enthereon Cipher Projects.pdf">About: Enthereon Cipher Projects</a></li>
            <li><a href="../../docs/Project Midnight.pdf">About: Project Midnight</a></li>
            <li><a href="../../docs/LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Live Cipher Engine<h2>
            </div>
        </div>
    </body>
</html>
```

### 1.13 `db.php`

```php
<?php
    session_start();
    include_once("../.sys/logic/session.php");
    pageloadProtocol();
    adminProtocol();
    timeoutProtocol();
    if (isset($_POST["pque"])){
        $query = $_POST["query"];
        $to_print = "<p class=notice><b>Received query: </b>{$query}</p>";
        $result = mysqli_query($dbconfig, $query);
        if (!($result)){
            $dberror = "Database Error: " . mysqli_error($dbconfig);
            $to_print .= "<p class=error>$dberror</p>";
        }
        else {
            $to_print .= "<p class=success>Query accepted.</p>";
            $key = explode(" ", $query)[0];
            if (!($result)){
                $to_print .= "<p class=notice>No result buffer</p>";
            }
            else {
                if ($key == "SELECT" || $key == "SHOW" || $key == "DESCRIBE"){
                    $to_print .= "<hr><table>";
                    $rows = mysqli_num_rows($result);
                    if (!($rows)) {
                        $to_print .= "<tr><td>No Data</td></tr>";
                    }
                    else {
                        $assoc = mysqli_fetch_assoc($result);
                        $headers = array_keys($assoc);
                        $to_print .= "<tr>";
                        foreach($headers as $head){
                            $to_print .= "<th>{$head}</th>";
                        }
                        $to_print .= "</tr>";
                        $to_print .= "<tr>";
                        foreach($headers as $key){
                            $dat = $assoc["$key"];
                            $to_print .= "<td>{$dat}</td>";
                        }
                        $to_print .= "</tr>";
                        while ($row = mysqli_fetch_assoc($result)){
                            $to_print .= "<tr>";
                            foreach($headers as $key){
                                $dat = $row["$key"];
                                $to_print .= "<td>{$dat}</td>";
                            }
                            $to_print .= "</tr>";
                        }
                    }
                    $to_print .= "</table>";
                }
            }
        }
    }
    unset($_POST);
    pageendProtocol();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta author="Silverous Black">
        <meta charset="utf-8">
        <meta summary="Database Server page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
        <title>Midnight: Log In</title>
        <link rel="icon" type="images/png" sizes="256x256" href="../resources/images/icon-256.png">
        <link rel="icon" type="images/png" sizes="128x128" href="../resources/images/icon-128.png">
        <link rel="icon" type="images/png" sizes="64x64" href="../resources/images/icon-64.png">
        <link rel="icon" type="images/png" sizes="32x32" href="../resources/images/icon-32.png">
        <link rel="icon" type="images/png" sizes="16x16" href="../resources/images/icon-16.png">
        <link rel="stylesheet" type="text/css" href="../scripts/css/basic.css">
        <link rel="stylesheet" type="text/css" href="../scripts/css/onboard.css">
    </head>
    <body>
        <ul>
            <img class="banner" src="../resources/images/banner logo medium.png" alt="Project Midnight Banner Logo Medium">
            <li><a href="profile.php">Manage Profile</a></li>
            <li><a href="manage.php">Manage Ciphers</a></li>
            <li><a href="live.php">Live Cipher</a></li>
            <?php
                if ($_SESSION["luas"] == 1){
                    echo "<li><a class='adminon' href=''>Database Server</a></li>";
                }
            ?>
            <li><a href="../.sys/logic/logout.php" class="logout">Log Out</a></li>
            <li><a href="../../docs/Enthereon Cipher Projects.pdf">About: Enthereon Cipher Projects</a></li>
            <li><a href="../../docs/Project Midnight.pdf">About: Project Midnight</a></li>
            <li><a href="../../docs/LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Database Server</h1>
                <p><b>[Administrator Privelege]</b> Directly communicate with the database here.</p>
                <form method="post" action="">
                    <input type="hidden" name="pque" value="true">
                    <label for="query">Query</label>
                    <br>
                    <input type="text" name="query" placeholder="Database Query" required>
                    <button type="submit" class="login">&rArr;</button>
                </form>
                <?php
                    if(isset($to_print)){
                        echo "<hr><h2>Results</h2>";
                        echo "{$to_print}";
                    }
                ?>
            </div>
        </div>
    </body>
</html>
```

## 2.0 Runtime and Technical Captures

### 2.1 Log In Page

![Log In Page](Log%20In%20Page%20Capture.png)

### 2.2 Sign Up Page

![Sign Up Page](Sign%20Up%20Page%20Capture.png)

### 2.3 Account Retrieval Page

![Account Retrieval Page](Account%20Retrieval%20Page.png)

### 2.4 Profile Management Page [Local]

![Profile Management Page](Profile%20Management%20Page%20[local].png)

### 2.5 Profile Management Page [Admin]

![Profile Management Page](Profile%20Management%20Page%20[admin].png)

### 2.6 Cipher Management Page [Local]

![Cipher Management Page](Profile%20Management%20Page%20[local].png)

### 2.7 Cipher Management Page [Admin]

![Cipher Management Page](Cipher%20Management%20Page%20[admin].png)

### 2.8 Live Cipher Engine Page [Local]

![Live Cipher Engine Page](Live%20Cipher%20Engine%20Page%20[local].png)

### 2.9 Live Cipher Engine Page [Admin]

![Live Cipher Engine Page](Live%20Cipher%20Engine%20Page%20[admin].png)

### 2.10 Database Server Page [Local]

![Database Server Page](Database%20Server%20Page%20[local].png)

### 2.11 Database Server Page [Admin]

![Database Server Page](Database%20Server%20Page%20[admin].png)

### 2.12 Database Structure

![Database Elements](Database%20Elements.png)

## 3.0 System Design

### 3.1 Entity Relationship Diagram

![ERD](../System%20Design/M-SD-01.png)

### 3.2 ID Characterics and Symbolic Cipher Process

![ID Characteristics](../System%20Design/M-SD-02A.png)

### 3.3 Data Flow Diagram (Level 0)

![DFD0](../System%20Design/M-SD-03G.png)
