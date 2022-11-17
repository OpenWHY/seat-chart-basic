<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="Author" content="壹吐·ONETO">
<title>座次系统基础版</title>
<style>
body {
    margin: 0px;
    padding: 0px;
    position: absolute;
}
.seat {
    width: 80px;
    height: 80px;
    float: left;
}
.seatIco {
    position: absolute;
    width: 80px;
    height: 80px;
    overflow: hidden;
}
.seatIco > img {
    width: 100%;
    height: 100%;
    position: absolute;
    left: -80px;
    top: 0;
    filter: drop-shadow(#C9C9C9 80px 0);
}
.active > img {
    filter: drop-shadow(#4364E8 80px 0);
}
.name {
    width: 80px;
    text-align: center;
    margin-top: 12px;
}
.pink {
    background-color: #FFE1E8;
    font-size: 12px;
    color: #000000;
    padding: 3px;
    font-weight: 600;
    width: 50px;
    display: block;
    margin: auto;
}
.null {
    height: 22px;
    display: block;
}
.no {
    width: 80px;
    text-align: center;
    margin-top: 15px;
    font-size: 13px;
}
.row {
    display: flex;
}
</style>
</head>
<body>
<?php
// 定义姓名数据
$data = array(
    array("姓名", "","王二麻子", "张三", "李四", "那伍", "", "姓名"),
    array("姓名", "","", "", "", "", "", "姓名"),
    array("", "姓名","", "", "", "", "姓名", ""),
    array("", "姓名","", "", "", "", "姓名", ""),
    array("", "","姓名", "", "", "姓名", "", ""),
    array("", "","姓名", "姓名", "姓名", "姓名", "", ""),
);
// 单行位子渲染
function danhangweizi($data, $hang) {
    $weishu = count($data[$hang]);
    $danhangweizi = '';
    for ($s = 0; $s < $weishu; $s++) {
        $xingming = $data[$hang][$s];
        $danhangweizi .= '
            <div class="seat">
                <div class="seatIco' . (empty($xingming) ? '' : ' active') . '">
                    <img src="./images/seat.svg">
                </div>
                <div class="name">
                    <span' . (empty($xingming) ? ' class="null"' : ' class="pink"') . '>' . $xingming . '</span>
                </div>
                <div class="no">' . ($hang + 1) . '-' . ($s + 1) . '</div>
            </div>
        ';
    }
    return $danhangweizi;
}

// 计算行数
$hangshu = count($data);

// 遍历所有行
for ($i = 0; $i < $hangshu; $i++) {
    echo '<div class="row">' . danhangweizi($data, $i) . '</div>';
}
?>
</body>
</html>
