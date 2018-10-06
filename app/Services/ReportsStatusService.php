<?php
namespace App\Services;

use App\Models\Entity;
use App\Models\Report;
use App\Models\ReportReaction;
use App\Models\ReportUpdate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ReportsStatusService
{

    private $status;
    private $report;

    public function __construct(Report $report, ReportUpdate $status)
    {
        $this->status = $status;
        $this->report = $report;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->status->all();
    }

    /**
     * @param $report_id
     * @return mixed
     */

    public function get($report_id){
        return $this->status->where('report_id', $report_id)->get();
    }

    /**
     * @param Array $post
     * @return mixed
     */
    public function store($post)
    {
        $validator = $this->validation($post);
        $report_id = $post['report_id'];

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {

            $status = ReportUpdate::create($post);

            $report = $this->report->find($report_id);
            $report->status = $post['status'];
            $report->update();

            return response()->json($status, Response::HTTP_CREATED);
        }
    }

    /**
     * @param $post
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validation($post){

        return Validator::make($post, [
            'description' => 'required',
            'report_id' => 'required',
            'user_id' => 'required'
        ]);

    }

}