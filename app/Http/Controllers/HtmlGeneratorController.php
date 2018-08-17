<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HtmlGeneratorController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function generate(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file',
            'template' => 'required',
        ]);

        $csv = new \ParseCsv\Csv($request->file->get());

        $result = '';

        foreach ($csv->data as $row) {
            $content = $request->template;

            foreach($row as $key => $value) {
                $content = str_replace('{{' . $key . '}}', $value, $content);
            }

            $result .= $content . "\n";
        }

        return view('result', compact('result'));
    }
}
