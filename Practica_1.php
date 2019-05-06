<html>
<head>
    <title>Formulario en PHP7</title>
</head>
<body>

<?php

    //Se define la clase persona
    class Persona{
        //PROPIEDADES:
        public $name;
        public $email;
        public $website;
        public $comment;
        public $gender;

        //Propiedades de error
        public $nameErr;
        public $emailErr;
        public $genderErr;
        public $websiteErr;

        //MÉTODOS
        public function mostrar (){
            echo "<p> 
            Nombre: $this->name <br>
            E-mail: $this->email <br>
            Website: $this->website <br>
            Comment: $this->comment <br>
            Gender: $this->gender <br>
            </p>";
        }
    }

    //Si se hace el submit se realiza la comprovación de datos
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Se instancia la clase persona
        $persona = new Persona();

        if (empty($_POST["name"])) {
            $persona -> nameErr = "Name is required";
        } else {
            $persona -> name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $persona -> $name)) {
                $persona -> nameErr = "Only letters and white space allowed";
            }
        }
        if (empty($_POST["email"])) {
            $persona -> emailErr = "Email is required";
        } else {
            $persona -> email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($persona -> $email, FILTER_VALIDATE_EMAIL)) {
                $persona -> emailErr = "Invalid email format";
            }
        }
        if (empty($_POST["website"])) {
            $persona -> website = "";
        } else {
            $persona -> website = test_input($_POST["website"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$persona -> website)) {
                $persona -> websiteErr = "Invalid URL";
            }
        }
        if (empty($_POST["comment"])) {
            $persona -> comment = "";
        } else {
            $persona -> comment = test_input($_POST["comment"]);
        }
        if (empty($_POST["gender"])) {
            $persona -> genderErr = "Gender is required";
        } else {
            $persona -> gender = test_input($_POST["gender"]);
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field.</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name" value="<?php if (isset($persona)) echo $persona -> name;?>">
        <span class="error">* <?php if (isset($persona)) echo $persona -> nameErr;?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php if (isset($persona)) echo $persona -> email;?>">
        <span class="error">* <?php if (isset($persona)) echo $persona -> emailErr;?></span>
        <br><br>
        Website: <input type="text" name="website" value="<?php if (isset($persona)) echo $persona -> website;?>">
        <span class="error"><?php if (isset($persona)) echo $persona -> websiteErr;?></span>
        <br><br>
        Comment: <textarea name="comment" rows="5" cols="40"><?php if (isset($persona)) echo $persona -> comment;?></textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($persona) && $persona -> gender=="female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($persona) && $persona -> gender=="male") echo "checked";?> value="male">Male
        <span class="error">* <?php if (isset($persona)) echo $persona -> genderErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        if (isset($persona)) {
            echo "<h2>Your Input:</h2>";
            echo $persona -> mostrar();
        }
?>

</body>
</html>
