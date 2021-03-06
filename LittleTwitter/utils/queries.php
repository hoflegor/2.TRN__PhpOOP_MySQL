<?php

//added by mysql console

$queryCreateDatabase = "CREATE DATABASE LittleTwitter";

$queryCreateTableUsers = "
                        CREATE TABLE users(
                        id INT AUTO_INCREMENT UNIQUE ,
                        username VARCHAR (255) UNIQUE ,
                        email VARCHAR (255) UNIQUE,
                        hashed_password VARCHAR (60) NOT NULL ,
                        creation_date DATETIME NOT NULL ,
                        PRIMARY KEY (id)
                        )
";

$queryCreateTableTweet ="
                        CREATE TABLE tweet(
                        id_tweet INT NOT NULL AUTO_INCREMENT,
                        id_user INT NOT NULL,
                        text VARCHAR (140) NOT NULL,
                        creation_date DATETIME NOT NULL ,
                        PRIMARY KEY (id_tweet),
                        FOREIGN KEY (id_user) REFERENCES users(id)
                        ON DELETE CASCADE
                        )
";

$queryCreateTableComment = "
                        CREATE TABLE comment(
                          id_comment INT NOT NULL AUTO_INCREMENT,
                          id_user INT NOT NULL,
                          id_tweet INT NOT NULL,
                          text VARCHAR (60) NOT NULL ,
                          creation_date DATETIME NOT NULL ,
                          PRIMARY KEY (id_comment),
                          FOREIGN KEY (id_tweet) REFERENCES tweet(id_tweet)
                          ON DELETE CASCADE
                          )
";

$queryCreateTableMessage="
                        CREATE TABLE messages(
                        id_message INT NOT NULL AUTO_INCREMENT,
                        id_sender INT NOT NULL,
                        id_receiver INT NOT NULL,
                        text VARCHAR (255) NOT NULL ,
                        creation_date DATETIME NOT NULL ,
                        status TINYINT(1) NOT NULL,
                        PRIMARY KEY (id_message),
                        FOREIGN KEY (id_sender) REFERENCES users (id),
                        FOREIGN KEY (id_receiver) REFERENCES users (id)
                        ON DELETE CASCADE
                        )
";
