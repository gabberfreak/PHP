<form action="" method="post">
    <label for="htmltag">Enter HTML tags:</label><br>
    <br/>
    <input type="text" name="tags"/>
    <button>Submit</button><br>

    <?php
        session_start();
        $validTags = array('a', 'abbr', 'acronym', 'address', 'applet', 'area', 'b', 'base', 'basefont',
            'bdo', 'bgsound', 'big', 'blockquote', 'blink', 'body', 'br', 'button', 'caption', 'center', 'cite', 'code',
            'col', 'colgroup', 'dd', 'dfn', 'del', 'dir', 'dl', 'div', 'dt', 'embed', 'em', 'fieldset', 'font', 'form',
            'frame', 'frameset', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'hr', 'html', 'iframe', 'img', 'input',
            'ins', 'isindex', 'i', 'kbd', 'label', 'legend', 'li', 'link', 'marquee', 'menu', 'meta', 'noframe',
            'noscript', 'optgroup', 'option', 'ol', 'p', 'pre', 'q', 's', 'samp', 'script', 'select', 'small', 'span', 'strike',
            'strong', 'style', 'sub', 'sup', 'table', 'td', 'th', 'tr', 'tbody', 'textarea', 'tfoot', 'thead', 'title',
            'tt', 'u', 'ul', 'var');
        $count = 0;
        if (isset($_POST['tags'])) {
            if($_POST['tags'] == '') {
                if(isset($_SESSION['count'])) {
                    unset($_SESSION['count']);
                }
            }
            if (in_array($_POST['tags'],$validTags)) {
                echo "<div style=\"font-size: 28px; font-weight: bold;\">Valid HTML tag!" . "<br>";
                if (isset($_SESSION['count'])) {
                    $_SESSION['count']++;
                } else {
                    $_SESSION['count'] = 0;
                }
                echo "Score: " . $_SESSION['count'];
            }  else if (!isset($_SESSION['count'])) {
                echo "<div style=\"font-size: 28px; font-weight: bold;\">Empty field not allowed!";
            } else {
                echo "<div style=\"font-size: 28px; font-weight: bold;\">Invalid HTML tag!" . "<br>";
                echo "Score: " . $_SESSION['count'];
            }
        }
    ?>
</form>