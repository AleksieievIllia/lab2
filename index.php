<!DOCTYPE HTML>
<html>

<head>
    <title>Лабораторна работа 2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script>
        function finishedTask() {
    let project = document.getElementById("project").value;
    let date = document.getElementById("date").value;
    let project_date = project + " " + date; 
    //alert(project_date);
    let result = localStorage.getItem(project_date);
    document.getElementById('res').innerHTML = result;
}

 function countProjects() {
    let manager = document.getElementById("managerProject").value;
    let managerCount = manager + "Count";
    let result = localStorage.getItem(managerCount);
    document.getElementById('res').innerHTML = result;
}
function workers(){
    let manager = document.getElementById("managerWorkers").value;
    let managerWorkers = manager + " Workers";
    let result = localStorage.getItem(managerWorkers);  
    document.getElementById('res').innerHTML = result;
}
     </script>
</head> 

<body>
    <h3>Алексеев Илья, КИУКИ-19-1, Вар №2</h3>
    <form method="get" action="1.php">
        <p>Вывеcти данные о выполенных задачах <select name="project" id="project" onchange = finishedTask()>
                <?php
                include 'connection.php';

                $project = $collection->distinct("project");

                foreach ($project as $document) {
                    echo "<option>";
                    print($document);
                    echo "</option>";
                }
                ?>

                </select>
                <select  name="date" id="date" onchange = finishedTask()>
                <?php
                include 'connection.php';
                $timeEnd = $collection->distinct("timeEnd");
                foreach ($timeEnd as $document) {
                    echo "<option>";
                    print gmdate("H:i:s Y-m-d", $document);
                    echo "</option>";
                }
                echo '</select>';
                ?>
                <input type="submit" value="ОК"></p>
    </form>

    <form method="get" action="2.php">
        <p>Количество проектов указанного руководителя <select name="managerProject" id="managerProject" onchange = countProjects()>
                <?php
                include 'connection.php';
                $manager = $collection->distinct("manager");
                foreach ($manager as $document) {
                    echo "<option>";
                    print($document);
                    echo "</option>";
                }
                echo '</select>';
                ?>
                <input type="submit" value="Ок"></p>
    </form>

    <form method="get" action="3.php">
        <p>Вывести информацию о сотрудниках руководителя: <select name="managerWorkers" id="managerWorkers" onchange = workers()>
                <?php
                include 'connection.php';
                $manager = $collection->distinct("manager");
                foreach ($manager as $document) {
                    echo "<option>";
                    print($document);
                    echo "</option>";
                }
                echo '</select>';
                ?>
                <input type="submit" value="Ок"></p>
    </form>
    <div id="res"></div>
            </br>
    
</body>
</html>