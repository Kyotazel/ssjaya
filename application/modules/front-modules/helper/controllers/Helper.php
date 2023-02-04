<?php defined('BASEPATH') or exit('No direct script access allowed');

class Helper extends BackendController
{
    public function create_url($method)
    {
        // check for current url
        if (filter_var($method, FILTER_VALIDATE_URL)) {
            return $method;
        }
        //for #
        if ($method == '#') {
            return $method;
        }

        $prefix_page = PREFIX_CREDENTIAL_DIRECTORY;
        $token          = $this->session->userdata('us_token_login');
        $encrypt_token  = $this->encryption->encrypt($token);
        $clear_method = substr($method, -1) == '/' ? substr($method, 0, strlen($method) - 1) : $method;
        if (substr($clear_method, 0, 1) != '/') {
            $clear_method = '/' . $clear_method;
        }
        //check if query url axist
        $explode_url = explode('?', $clear_method);
        $query_url = count($explode_url) > 1 ?   $clear_method . '&token=' . urlencode($encrypt_token) :  $clear_method . '?token=' . urlencode($encrypt_token);
        $url = base_url($prefix_page . $query_url);
        return $url;
    }

    public function date_indo($date, $delimiter)
    {
        $array_month = [
            '01' => 'januari', '02' => 'februari', '03' => 'maret', '04' => 'april', '05' => 'mei', '06' => 'juni', '07' => 'juli', '08' => 'agustus', '09' => 'september', '10' => 'oktober', '11' => 'november', '12' => 'december'
        ];
        $explode_date = explode($delimiter, $date);
        $date_return = $explode_date[2] . ' ' . ucfirst($array_month[$explode_date[1]]) . ' ' . $explode_date[0];
        return $date_return;
    }

    public function datetime_indo($datetime)
    {
        $explode_datetime = explode(' ', $datetime);
        $time = $explode_datetime[1];
        $date = $explode_datetime[0];

        $array_month = [
            '01' => 'januari', '02' => 'februari', '03' => 'maret', '04' => 'april', '05' => 'mei', '06' => 'juni', '07' => 'juli', '08' => 'agustus', '09' => 'september', '10' => 'oktober', '11' => 'november', '12' => 'december'
        ];
        $explode_date = explode('-', $date);
        $date_return = $explode_date[2] . ' ' . ucfirst($array_month[$explode_date[1]]) . ' ' . $explode_date[0];

        $explode_time = explode(':', $time);
        $date_return .= '&nbsp;&nbsp; ' . $explode_time[0] . ':' . $explode_time[1];
        return $date_return;
    }
}