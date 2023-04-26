<!DOCTYPE html>
<html lang="cs-cz">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="styl.css" type="text/css" />
		<title>Registrace uživatele</title>	
	</head>

	<body>
        <article>
          <header>
			<div id="logo" img src="obrazky/logo.png" alt="Programátor" >
            <h1>Kristýna <span>Šafaříková</span></h1>
            <small>Programátor</small> <small>Grafik</small>
            </div>
              <nav>
		          <ul>
				      <li class="aktivni">
					   <a href="index.php" >Domů</a>
                        </li>	
				         <li>
					     <a href="projekt.php" >Projekt</a>
                         </li>
				         <li>
					     <a href="omne.html" >O mně</a>
                         </li>
                  </ul>	
              </nav>		
          </header>
         <section >
            <div>
		    <p>
                Vítejte na mém prvním projektu.<br>
				Vytvořila jsem webovou aplikaci, která umožňuje registraci uživatelů.<br>
				Registrace proběhla v pořádku, zobrazí-li se potvrzovací hláška
				a zadané údaje se propíšou do tabulky. <br>
            </p>
            </div>
		    <h2>Nová registrace</h2>
             <form method="post">
			   Jméno:<br />
			     <input type="text" name="jmeno" /><br />
			     Příjmení:<br />
			     <input type="text" name="prijmeni" /><br />
                 Věk:<br />
			     <input type=INT name="vek" /><br/>
			     Telefon:<br />
			     <input type=INT name="telefon" /><br />
			     <input type="submit" value="Registrovat" class="btn-primary" />
             </form>
     <?php
        require_once('Db.php');			
		Db::connect('127.0.0.1', 'databaze_pro_web', 'root', '');
		
		if ($_POST)
		{	
           	
           //echo "INSERT INTO uzivatele (jmeno, prijmeni,	vek, telefon)	
		   //''VALUES (".$_POST['jmeno'].$_POST['prijmeni'].$_POST['vek'].$_POST['telefon'];
           //echo $datum;
			Db::query("
				INSERT INTO uzivatele (jmeno, prijmeni,	vek, telefon)	
				VALUES ('$_POST[jmeno]', '$_POST[prijmeni]', $_POST[vek], '$_POST[telefon]')");
			echo('<p>Byl jste úspěšně zaregistrován.</p>');
		}
		
		$uzivatele = Db::queryAll('
			SELECT *
			FROM uzivatele
		');
		echo('<h1>Seznam registrací</h1><table class="table">');
		echo "<TR><TH>Jméno</TH><TH>Příjmení</TH><TH>Věk</TH><TH>Telefon</TH></TR>  ";
		foreach ($uzivatele as $u)
		{
			echo('<tr><td>' . htmlspecialchars($u['jmeno']));
			echo('</td><td>' . htmlspecialchars($u['prijmeni']));
            echo('</td><td>' . htmlspecialchars($u['vek']));
			//$datum = date("d.m.Y", strtotime($u['datum_narozeni']));
			//echo('</td><td>' . htmlspecialchars($datum));
			echo('</td><td>' . htmlspecialchars($u['telefon']));
			echo('</td></tr>');
		}
		echo('</table>');
?>
     </section>
    <br /> <br /> <br />
    <footer>
    Copyright © 2023 Tyna 
    </footer>
	</article>
</body>
</html>