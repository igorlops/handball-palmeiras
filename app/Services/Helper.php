<?php

use Carbon\Carbon;

if(!function_exists('convertDatePattern'))
{
    function convertDatePattern($data)
    {
        // Defina o formato esperado: dia/mês/ano (d/m/Y)
        try {
            $dataConverted = Carbon::createFromFormat('d/m/Y', $data)->format('Y-m-d');
            return $dataConverted;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao converter a data: " . $e->getMessage());
        }
    }
}

if (!function_exists('convertDateBr')) {
    function convertDateBr($data)
    {
        // Defina o formato esperado: dia/mês/ano (d/m/Y)
        try {
            $dataConverted = Carbon::createFromFormat('Y-m-d', $data)->format('d/m/Y');
            return $dataConverted;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao converter a data: " . $e->getMessage());
        }
    }
}
if (!function_exists('convertDateHourBr')) {
    function convertDateHourBr($data)
    {
        // Defina o formato esperado: dia/mês/ano (d/m/Y)
        try {
            $dataConverted = Carbon::createFromFormat('Y-m-d H:i:s', $data)->format('d/m/Y H:i');
            return $dataConverted;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao converter a data: " . $e->getMessage());
        }
    }
}
