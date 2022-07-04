<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib3\Crypt\Random;
use phpseclib3\Crypt\DES;


class DESController extends Controller
{

    public function index()
    {
        return view('chiasekhoa');
    }

    public function chiasekhoa(Request $request)
    {
        $khoa = $request->input('khoa');
        $tvgiukhoa = $request->input('tvgiukhoa');
        $tvtoithieu = $request->input('tvtoithieu');
        $p = $request->input('p');

        $a = array();
        for ($i = 1; $i < $tvtoithieu; $i++)
            $a[$i] = rand(1, 50);

        $x = array();
        for ($i = 1; $i <= $tvgiukhoa; $i++)
            $x[$i] = $i;

        $y = array();

        for ($i = 1; $i <= $tvgiukhoa; $i++) {
            $m = 0;
            for ($j = 1; $j < $tvtoithieu; $j++)
                $m += $a[$j] * pow($x[$i], $j);
            $y[$i] = ($khoa + $m) % $p;
        }
        return view('chiasekhoa', compact('y'));
    }


    public function khoiphuckhoa()
    {
        return view('khoiphuckhoa');
    }


    public function khoiphuc(Request $request)
    {
        $tvtoithieu = $request->input('tvtoithieu');
        $p = $request->input('p');
        $xinput = $request->input('x');
        $x = explode(' ', $xinput);
        $yinput = $request->input('y');
        $y = explode(' ', $yinput);

        function nd($a, $b)
        {
            $b0 = $b;
            $t = 0;
            $q = 0;
            $x0 = 0;
            $x1 = 1;
            if ($b == 1) return 1;
            while ($a < 0) $a += $b;
            while ($a > 1) {
                $q = floor($a / $b);
                ($t = $b);
                ($b = $a % $b);
                ($a = $t);
                ($t = $x0);
                ($x0 = $x1 - $q * $x0);
                ($x1 = $t);
            }
            if ($x1 < 0) $x1 += $b0;
            return $x1;
        }

        $k = 0;
        for ($l = 1; $l <= $tvtoithieu; $l++) {
            $m = 1;
            for ($j = 1; $j <= $tvtoithieu; $j++) {
                if ($j != $l) {
                    $b = $x[$j - 1] - $x[$l - 1];
                    $n = ((($x[$j - 1] % $p) * nd($b, $p)) % $p) % $p;
                    $m = (($m % $p) * ($n % $p)) % $p;
                }
            }
            $k = round(($k + (($y[$l - 1] * $m) % $p)) % $p);
        }

        // $k = nd(8,29);
        return view('khoiphuckhoa', compact('k'));
    }

    public function mahoa()
    {
        return view('mahoades');
    }

    public function mahoades(Request $request)
    {
        $data ='0';
        //dd($request);
        if ($request->hasFile('file')) {
            $path = $request->file('file');

            $myfile = fopen($path, "r") or die("Unable to open file!");
            $data = fread($myfile,filesize($path));
        } else
            $data = $request->input('thongtin');

        $khoa = $request->input('khoades');

        $cipher = new DES('ecb');
        $cipher->setKey($khoa);

        $k = $cipher->encrypt($data);
        $ciphertext = bin2hex($k);
        return view('mahoades', compact('ciphertext','data'));
    }

    public function giaimades(Request $request)
    {
        $data = hex2bin($request->input('banma'));
        $khoa = $request->input('khoades');

        $cipher = new DES('ecb');
        $cipher->setKey($khoa);

        $text = $cipher->decrypt($data);
        return view('mahoades', compact('text','data'));
    }
}
