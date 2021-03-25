<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.nav {
    height: 100px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: black 5px 0px 10px;
    overflow: hidden;
}

.fixed {
    position:fixed;
    top:0;
    left:0;
    right:0;
    width:100%;
    z-index:99;
    background-color: #fff;
    height: 90px;
    opacity: 0.99;
}

.nav .links {
    height: 100px;
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.nav ul {
    display: flex;
    justify-content: center;
    align-items: center;
}
 
.nav .logo{
    font: 1.2em sans-serif;
    height: 100%;
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.nav li a {
    text-decoration: none;
    color: #333;
}

.nav li a:hover {
    text-decoration: none;
    color: #4444;
    text-decoration: underline;
}

.nav li {
    list-style-type: none;
    margin: 2rem;
}

.navBtn {
    box-shadow: #fff 1px 1px 10px;
    background-color: #333;
    border-radius: 5px;
    padding: 0.6rem 1.1rem;
}

.navBtn:hover {
    background-color: #333;
    border: 0.5px #333 solid;
    border-radius: 5px;
    padding: 0.6rem 1.1rem;
    text-decoration: underline;
}
</style>
</head>
<body>
<div class="nav fixed">
    <div class="logo">
        <h1>Grenland Cabins</h1>
    </div>
    <div class="links">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">Om oss</a></li>
            <li><a href="#bestill">Bestill</a></li>
            <li><a href="#kontakt" class="navBtn" style="color: #fff;" >Ta Kontakt</a></li>
        </ul>
    </div>
</div>
</body>
</html>