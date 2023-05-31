<!Doctype html>
<html>
<head>

</head>
<body>
<h5>Besyo basvuru sayfası</h5>
<form action = "/create" method = "post" enctype="multipart/form-data">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <table>
        <tr>
            <td>TC</td>
            <td><input type='text' name='tc' /></td>
        <tr>
        <tr>
            <td>isim</td>
            <td><input type='text' name='isim' /></td>
        <tr>
            <td>soy_isim</td>
            <td><input type="text" name='soy_isim'/></td>
        </tr>
        <tr>
            <td>CİNSİYET</td>
            <td>
                <select name="cinsiyet">
                    <option value="erkek">ERKEK</option>
                    <option value="kadın">KADIN</option>
                </select></td>
        </tr>
        <tr>
            <td>Dogum_tarihi</td>
            <td><input type="date" name='dogum_tarihi'/></td>
        </tr>
        <tr>
            <td>Dogum_yeri</td>
            <td><input type="text" name='dogum_yeri'/></td>
        </tr>
        <tr>
            <td>UYRUK</td>
            <td>
                <select name="uyruk">
                    <option value="TC">TC</option>
                    <option value="yabancı">YABANCI</option>
                </select></td>
        </tr>
        <tr>
            <td>telefon</td>
            <td><input type="text" name='telefon'/></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name='email'/></td>
        </tr>
        <tr>
            <td>Adres</td>
            <td><input type="text" name='adres'/></td>
        </tr>
        <tr>
            <td>Okul-adı</td>
            <td><input type="text" name='okul_adı'/></td>
        </tr>
        <tr>
            <td>Bolum_adı</td>
            <td><input type="text" name='bolum_adı'/></td>
        </tr>
        <tr>
            <td>Egıtım_durumu</td>
            <td>
                <select id="egitim_durumu" name="egitim_durumu">
                    <option value="ilk">ilk</option>
                    <option value="orta">orta</option>
                    <option value="lise">lise</option>
                    <option value="lisans">lisans</option>
                    <option value="yükseklisans">yükseklisans</option>
                </select></td>
        </tr>
        <tr>
            <td>engel_durumu</td>
            <td>
                <select name="engel_durumu">
                    <option value="1">evet</option>
                    <option value="0">hayır</option>
                </select></td>
        </tr>


            <input type='file' id="engel_durum_raporu" name="engel_durum_raporu"  required="required"  accept="image/png, image/jpeg">
           <td><input type='file' id="profil_resmi" name="profil_resmi" required="required"  accept="image/png, image/jpeg">Profil</td>
            <td><input type='file' id="osym_dosyasi" name="osym_dosyasi" required="required" accept="application/pdf">OSym</td>

        <tr>
            <td>Aynı Alan</td>
            <td>
                <select name="aynı_alan">
                    <option value="1">evet</option>
                    <option value="0">hayır</option>
                </select></td>
        </tr>

        <tr>
            <td colspan = '2'>
                <input type = 'submit' value = "Add student"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
