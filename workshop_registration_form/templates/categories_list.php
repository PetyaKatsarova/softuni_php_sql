<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categories: </title>
    <link rel="stylesheet" href="templates/style/styles.css"/>
</head>
<body>
<h1 style="background:purple;color: white">Categories: </h1>
<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Questions Count</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categories as $category){ ?>
            <tr>
               <td>
                    <a href="<?php url("category.php?id={$category['id']}") ?>"><?php $category['name']; ?></a>
                </td>
                <?php $category['questions_count']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>