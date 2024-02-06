function wijzig()
{
    let ok =true;

    if(document.getElementById("voornaam").value === "")
    {
        document.getElementById("klantvoornaamongeldig").innerHTML = "Geef een voornaam in.";
        ok = false
    }
    else
    {
        document.getElementById("klantvoornaamongeldig").innerHTML = "";
    }


    if(document.getElementById("achternaam").value === "")
    {
        document.getElementById("klantachternaamongeldig").innerHTML = "Geef een achternaam in.";
        ok=false;

    }
    else
    {
        document.getElementById("klantachternaamongeldig").innerHTML = "";

    }

    if(isNaN(document.getElementById("telefoon").value) || document.getElementById("telefoon").value === "")
    {
        document.getElementById("telefoonongeldig").innerHTML = "Alleen cijfers invullen.";
        ok=false;

    }
    else
    {
        document.getElementById("telefoonongeldig").innerHTML = "";

    }

    if(document.getElementById("postcodeid").value === "" )
    {
        document.getElementById("postcodeongeldig").innerHTML = "Geef een postcode in aub.";
        ok = false;
    }
    else
    {
        document.getElementById("postcodeongeldig").innerHTML = "";
    }

    if(document.getElementById("email").value === "")
    {
        document.getElementById("emailongeldig").innerHTML = "Geef een email in.";
        ok = false
    }
    else
    {
        document.getElementById("emailongeldig").innerHTML = "";
    }

    if(document.getElementById("wachtwoord").value === "")
    {
        document.getElementById("wachtwoordongeldig").innerHTML = "Geef een wachtwoord in.";
        ok = false;
    }
    else
    {
        document.getElementById("wachtwoordongeldig").innerHTML = "";
    }

    if(document.getElementById("adres").value === "")
    {
        document.getElementById("adresongeldig").innerHTML = "geef in een adres";
    }
    else
    {
        document.getElementById("adresongeldig").innerHTML = "";
        ok = false;
    }

    if(ok === true)
    {
        document.formverander.submit();
    }
}