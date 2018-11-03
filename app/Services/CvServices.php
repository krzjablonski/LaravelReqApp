<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 31.10.18
 * Time: 08:08
 */

namespace App\Services;


class CvServices
{
    public function processCvName($file)
    {
        $fileName = $file->getClientOriginalName();
        $fileExt = $file-> getClientOriginalExtension();

        $search = ['ą', 'ć', 'ę', 'ł', 'ń', 'ó', 'ś', 'ź', 'ż', 'Ą', 'Ć', 'Ę', 'Ł', 'Ń', 'Ó', 'Ś', 'Ź', 'Ż', ' '];
        $replaceWith = ['a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z', 'A', 'C', 'E', 'L', 'N', 'O', 'S', 'Z', 'Z', ''];

        return str_replace($search, $replaceWith, $fileName);
    }
}
