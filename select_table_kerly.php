<?
    include_once('./header.php');
    //값을 가져올 때 market
    $sql="SELECT * FROM market_kerly_gaib_table";
    $result=mysqli_query($conn, $sql);
    // echo 'num: '.mysqli_nume_rows($result);

    $arr=array(); //배열생성 여러개 들고올 것이기 때문에
    //myadmin에 넣은내용이 있는지
    if(mysqli_num_rows($result) > 0){
        while($row=mysqli_fetch_array($result)){
            array_push($arr, array(
                '번호' => $row['idx'],
                '아이디' => $row['id'],
                '비밀번호' => $row['pw'],
                '이름' => $row['name'],
                '이메일' => $row['email'],
                '휴대폰' => $row['hp'],
                '성별' => $row['gender'],
                '생일' => $row['birth'],
                '추가입력사항' => $row['addinput'],
                '이용약관' => $row['agrement'],
                '가입일자' => $row['joindate']
            ));
        }
    }
    //JSON 형식으로 변환
    $json_result=json_encode($arr, JSON_UNESCAPED_UNICODE);
    $json_file=file_put_contents('./data/kerly_member.json', $json_result);
    echo $json_result;

    include_once('./footer.php');
?>