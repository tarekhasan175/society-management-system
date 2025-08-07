<?php

use Illuminate\Support\Facades\Storage;
use NumberToWords\NumberToWords;
use Illuminate\Support\Str;



function getFile($path = null)
    {
        if ($path == null) {
            return '';
        }
        try {
            // return '';
            return Storage::cloud()->url($path);
        } catch (\Exception $ex) {
            return '';
        }
    }

function oldSelect($field_name, $value, $defaultValue = null): string
{
    return old($field_name, $defaultValue) == $value ? 'selected' : '';
}

function requestSelect($field_name, $value, $defaultValue = null): string
{
    return request($field_name, $defaultValue) == $value ? 'selected' : '';
}

function currencyToWords($num): string
{
    return str_replace('-',' ',(new NumberToWords)->getCurrencyTransformer('en')->toWords(str_contains($num, '.') ? ((double)$num * 100) : $num, 'USD'));
}

function inWords($amount): string
{
    $f = new NumberFormatter(locale_get_default(), \NumberFormatter::SPELLOUT );

    return ucwords(str_replace('-',' ', $f->format($amount)));
}

function updateEmploymentPosition($request, $model)
{
    $oldModel = clone($model);

    $data = $model->with('employee.active_employment')->latest()->take(300)->whereDoesntHave('position')->get();

    $count = 0;

    foreach ($data as $key => $item) {
        $item->update([
            'position_id' => optional(optional($item->employee)->active_employment)->id
        ]);
        $count++;
    }

    if ($count > 0) {
        $nextCount = $oldModel->whereDoesntHave('position')->count();
        $message = $count . ' Employment position updated. ';

        if ($nextCount > 300) {
            return $message . ' Reload for next 300 from ' . $nextCount;
        } else if($nextCount > 0) {
            return $message . ' Reload for last ' . $nextCount;
        }
    }

    return '';
}


function getValidationErrorMessage($name)
{
    return view('partials._error-message', ['name' => $name])->render();
}



function hasField($path)
{
    try {
        return config($path);
    } catch (\Exception $th) {
        return 1;
    }
}

function str_slug($title)
{
    return Str::slug($title);
}

function isSystemAdmin()
{
    return auth()->id() == 1;
}

function getOldValue($name)
{
    return request($name, old($name));
}

function convert_number($number)
    {
        if (($number < 0) || ($number > 999999999))
        {
            throw new Exception("Number is out of range");
        }
        $giga = floor($number / 1000000);
        // Millions (giga)
        $number -= $giga * 1000000;
        $kilo = floor($number / 1000);
        // Thousands (kilo)
        $number -= $kilo * 1000;
        $hecto = floor($number / 100);
        // Hundreds (hecto)
        $number -= $hecto * 100;
        $deca = floor($number / 10);
        // Tens (deca)
        $n = $number % 10;
        // Ones
        $result = "";
        if ($giga)
        {
            $result .= convert_number($giga) .  "Million";
        }
        if ($kilo)
        {
            $result .= (empty($result) ? "" : " ") .convert_number($kilo) . " Thousand";
        }
        if ($hecto)
        {
            $result .= (empty($result) ? "" : " ") .convert_number($hecto) . " Hundred";
        }
        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
        $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
        if ($deca || $n) {
            if (!empty($result))
            {
                $result .= " and ";
            }
            if ($deca < 2)
            {
                $result .= $ones[$deca * 10 + $n];
            } else {
                $result .= $tens[$deca];
                if ($n)
                {
                    $result .= "-" . $ones[$n];
                }
            }
        }
        if (empty($result))
        {
            $result = "zero";
        }
        return $result;
    }

    function companyInfo()
    {
        return \App\Models\Company::find(1);
    }


function getInWord($number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Taka = implode('', array_reverse($str));
    $poysa = ($decimal) ? " and " . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' ' : '';
    $currency = isset(optional(auth()->user()->businessProfile)->currency) ? optional(auth()->user()->businessProfile)->currency : "৳";

    return ($Taka ? $Taka  : '') . $poysa .$currency . ' only ' ;
}

function vatAmount($amount, $vatPercent)
{

    return;
}
function totalWithVat($amount, $vatPercent)
{
    $vatDecimal = ($vatPercent / 100);
    return $amount / (1 + $vatDecimal);
}
function totalWithoutVat($amount, $vatPercent)
{
    $vatDecimal = $vatPercent / 100;
    return $amount / (1 + $vatDecimal);
}
