<?php 
$activityDao = new App\DAO\ListeningActivityDAO;
$artistDao   = new App\DAO\ArtistDAO;

function sendJSON($data) {
    if (isset($_GET['callback'])) {
        print $_GET['callback'].'('.json_encode($data).');';
    } else {
        print json_encode($data);
    }
}


$app->get('/', function () {
    echo file_get_contents(ROOT_PATH.'public/api-docs.html');
});

$app->get('/all', function () use ($activityDao) {
    sendJSON($activityDao->getAll());
});

$app->get('/dates', function () use ($activityDao) {
    sendJSON($activityDao->getDates());
});

$app->get('/artists', function () use ($artistDao) {
    sendJSON($artistDao->getNames());
});

$app->get('/:date', function ($date) use ($activityDao) {
    sendJSON($activityDao->getByDate($date));
});

