<?php
/**
 * @Author Faazy Ahamed
 * @eMail <faaziahamed@gmail.com>
 * @Mobile +94713221220
 * Date: 09/May/2021
 * Time: 1:57 PM
 */

namespace App\Controllers;


use App\Entities\Campaign;

class SalesReport extends Controller
{
    public function index($request)
    {
        $this->validation($request, ['start_date' => 'required', 'end_date' => 'required']);

        $campaign = new Campaign($this->databaseConnection);
        $data = $campaign->getCampaignsByDateRange($request['start_date'], $request['end_date']);

        return $this->view('sales_report.php', $data);
    }
}