<?php
function getEmail($userbase_db,$user_id) {
    $pull_email = mysqli_query($userbase_db, "SELECT email FROM user_table WHERE user_id='$user_id' ");

    if (mysqli_num_rows($pull_email) == 1) {           //Available to pull

        $email_result = mysqli_fetch_array($pull_email);
        $email = $email_result['email'];

        return $email;
    }
    else {                                //No available record or id not valid
        return $email = -1;
    }
}

function getUserID($userbase_db,$email)
{

    $pull_userid = mysqli_query($userbase_db, "SELECT user_id FROM user_table WHERE email='$email' ");

    if (mysqli_num_rows($pull_userid) == 1) {           //Available to pull

        $userid_result = mysqli_fetch_array($pull_userid);
        $user_id = $userid_result['user_id'];

        return $user_id;
    }
    else {                                //No available record or email not valid
        return $user_id = -1;
    }
}

function getName($userbase_db,$user_id)
{

    $pull_userid = mysqli_query($userbase_db, "SELECT name FROM user_table WHERE user_id='$user_id' ");

    if (mysqli_num_rows($pull_userid) == 1) {           //Available to pull

        $userid_result = mysqli_fetch_array($pull_userid);
        $name = $userid_result['name'];

        return $name;
    }
    else {                                //No available record or email not valid
        return $name = -1;
    }
}

