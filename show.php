<?php

$page_size = 5;
$row = mysqli_fetch_array(
    mysqli_query(
        $link,
        "SELECT ceil(COUNT(*)/$page_size) as C FROM guestbook"
    ),
    MYSQLI_ASSOC
);

$page_count = $row["C"];

$pagination = "";
for ($i = 1; $i <= $page_count; $i++) {
    $pagination .= "<a href='?page=$i'>$i</a>" . "&nbsp;";
}

echo $pagination . "<br>";

$start_row = (($_GET["page"] ?? 1) - 1) * $page_size;

$result = mysqli_query(
    $link,
    "SELECT text, name FROM guestbook LIMIT $start_row, $page_size"
);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<b>" . $row["name"] . ":&nbsp; " . "</b>" . sm(bb_code($row["text"])). "<br>";
}

echo $pagination . "<br>";

mysqli_free_result($result);

    ?>