<?php
final class LoginView
{
    public function displayLoginForm()
    {
?>
        <form action="" method="POST">
            <label for="userName">
                UserName : 
                <input type="text" name="userName" required/>
            </label>
            <label for="password">
                Password :
                <input type="text" name="password" required/>
            </label>

            <label for="signIn">
                <input type="submit" name="submitConnexion" />
            </label>
        </form>
<?php
    }
}
?>