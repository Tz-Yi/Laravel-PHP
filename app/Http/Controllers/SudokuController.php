<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PHPAnalytics as Analytics;
use GuzzleHttp\Client;
use Illuminate\Notification\Notifiable;
use Illuminate\Notification\Notification;

class SudokuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $client;

    public function __construct(Client $client)
    {
        $this->middleware('auth');
        $this->client = $client;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function getAnswer() {
      $client = new Client([
        'base_uri' => 'https://md379qzxte.execute-api.us-east-1.amazonaws.com/default/sudoku',
        'timeout' => 10.0,
      ]);

      $response = $client->request('GET', 'https://md379qzxte.execute-api.us-east-1.amazonaws.com/default/sudoku', [
        'query' => ['question' => $question]
      ]);
    }

    public function index(
      $question = '200000060000075030048090100000300000300010009000008000001020570080730000090000004',
      $getAnswer = True
      )
    {

      if ($getAnswer == True) {
        $client = new Client([
          'base_uri' => 'https://md379qzxte.execute-api.us-east-1.amazonaws.com/default/sudoku',
          'timeout' => 10.0,
        ]);

        $response = $client->request('GET', 'https://md379qzxte.execute-api.us-east-1.amazonaws.com/default/sudoku', [
          'query' => ['question' => $question]
        ]);

        echo json_decode($response->getBody());

        return view('pages.sudoku')->with(['question'=> $question, 'answer' => json_decode($response->getBody())]);
      } else {
        return view('pages.sudoku')->with(['question'=> $question]);
      }


    }
}
