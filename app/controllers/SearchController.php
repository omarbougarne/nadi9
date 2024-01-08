<?php
class SearchController
{
    public function index()
    {
        // Fetch the list of companies
        $companyDAO = new CompanyDAO();
        $allCompanies = $companyDAO->getAllCompanies();

        // Initialize variables
        $availableSchedules = [];
        $filteredSchedules = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['departureCity'], $_POST['arrivalCity'], $_POST['numPeople'])) {
                $date = (!empty($_POST['travelDate']) && strtotime($_POST['travelDate']) >= strtotime(date('Y-m-d'))) ?
                    $_POST['travelDate'] : date('Y-m-d');
                $scheduleDAO = new ScheduleDAO();
                $endCity = $_POST['arrivalCity'];
                $startCity = $_POST['departureCity'];
                $places = $_POST['numPeople'];
                $_SESSION['departureCity'] = $_POST['departureCity'];
                $_SESSION['arrivalCity'] = $_POST['arrivalCity'];
                $_SESSION['travelDate'] = $date;
                $_SESSION['numPeople'] = $_POST['numPeople'];
                $availableSchedules = $scheduleDAO->getScheduelByEndCityStartCity($date, $endCity, $startCity, $places);
                if (isset($_POST['companyFilter'])) {
                    $selectedCompanyID = $_POST['companyFilter'];
                    foreach ($availableSchedules as $schedule) {
                        $scheduleCompanyID = $schedule->getBusID()->getCompany()->getCompanyID();

                        if ($selectedCompanyID === '' || $scheduleCompanyID == $selectedCompanyID) {
                            $filteredSchedules[] = $schedule;
                        }
                    }
                } else {
                    $filteredSchedules = $availableSchedules;
                }
            }
        } else {
            $scheduleDAO = new ScheduleDAO();
            $availableSchedules = $scheduleDAO->getAllSchedules();
            $filteredSchedules = $availableSchedules;
        }
        
        include_once 'app/views/searchPage.php';
    }
}