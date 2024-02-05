function wijzig(){

    let ok =true;

    if(document.getElementById("klantvoornaamtoe").value === "")
    {
        document.getElementById("klantvoornaamongeldig").innerHTML = "Geef een voornaam in.";
        ok = false
    }
    else
    {
        document.getElementById("klantvoornaamongeldig").innerHTML = "";
    }


    if(document.getElementById("klantachternaam").value === "")
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

    if(document.getElementById("postcode").value === "" )
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

    if(ok === true)
    {
        document.formtoevoegen.submit();
    }

}