<?php
    session_start();
    if(!empty($_SESSION))
    {
        if(empty($_SESSION['status']) || $_SESSION['usertype']!="Student")
        {
            header('location:logout.php');
        }
    }
    else
    {
        if(empty($_COOKIE['status']) || $_SESSION['usertype']!="Student")
        {
            header('location:logout.php');
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>CHANGE PASSWORD</title>
</head>
<body>
    <fieldset>
        <p>NSS Training Center</p>
        <?php
            if(!empty($_SESSION))
            {
                echo "<p align='right'>Logged in as <a href='owninformation.php'>".$_SESSION['name']."</a>|<a href='logout.php'>Logout</a></p>";
            }
            else
                echo "<p align='right'>Logged in as <a href='owninformation.php'>".$_COOKIE['name']."</a>|<a href='logout.php'>Logout</a></p>";
        ?>
    </fieldset>
    <fieldset>
        <table width="100%" border="1">
            <tr>
                <td rowspan="6" width="30%">
                    Account
                    <hr/>
                    <ul>
                        <li><a href="student.php">Student Home</a></li>
                        <li><a href="owninformation.php">Own Information</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </td>
                <td rowspan="6">
                    <fieldset>
                        <legend><b>CHANGE PASSWORD</b></legend>
                        <form method="post">
                            <table>
                                <tr>
                                    <td><font size="3">Current Password</font></td>
                                    <td>:</td>
                                    <td><input type="password" name="password" /></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><font size="3" color="blue">New Password</font></td>
                                    <td>:</td>
                                    <td><input type="password" name="newpassword" /></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><font size="3" color="red" >Retype New Password</font></td>
                                    <td>:</td>
                                    <td><input type="password" name="renewpassword"/></td>
                                    <td></td>
                                </tr>
                            </table>
                            <hr />
                            <input type="submit" name="submit" value="submit" />
                        </form>
                    </fieldset>
                </td>
            </tr>
        </table>
    </fieldset>
</body>
<?php
    if(isset($_POST['submit']))
    {
        if(!empty($_SESSION))
        {
            if($_SESSION['password']==$_POST['password'])
            {
                if($_POST['newpassword']==$_POST['renewpassword'])
                {
                    $_SESSION['password']=$_POST['newpassword'];
                    echo "Password Changed";
                }
                else
                    echo "New password must be same as renew password";
            }
            else
                echo "Current Password is not correct";
        }
        elseif(!empty($_COOKIE['password']))
        {
            if($_COOKIE['password']==md5($_POST['password']))
            {
                if($_POST['newpassword']==$_POST['renewpassword'])
                {
                    setcookie('password',$_POST['password'],time()+3600,'/');
                    echo "Password is Changeded";
                }
                else
                    echo "New password must be same renew password";
            }
            else
                echo "Current Password is not correct";
        }
    }
    
?>