<?php 
$activityDao = new App\DAO\ListeningActivityDAO;

function sendJSON($data) {
    print json_encode($data);
}

$app->get('/all', function () use ($activityDao) {
    sendJSON($activityDao->getAll());
});

$app->get('/dates', function () use ($activityDao) {
    sendJSON($activityDao->getDates());
});

$app->get('/:date', function ($date) use ($activityDao) {
    sendJSON($activityDao->getByDate($date));
});