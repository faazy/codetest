<?php
/**
 * @Author Faazy Ahamed
 * @eMail <faaziahamed@gmail.com>
 * @Mobile +94713221220
 * Date: 09/May/2021
 * Time: 2:02 PM
 */

namespace App\Entities;

use App\Core\Database;

class Campaign extends Database
{
    const TYPE_SALES = 1;

    /**
     * @param $start_date
     * @param $end_date
     * @return \Generator|string
     */
    public function getCampaignsByDateRange($start_date, $end_date)
    {
        return $this->query(
            "SELECT 
                        campaigns.id, 
                        campaigns.title, 
                        campaigns.type, 
                        (SELECT SUM(order_value) FROM orders WHERE orders.campaign_id = campaigns.id) AS total_revenue 
                    FROM 
                         campaigns 
                    WHERE 
                          campaigns.type = 1 AND
                          start_date >= :start_date AND end_date <= :end_date",
            ['start_date' => $start_date, 'end_date' => $end_date]
        );
    }

}