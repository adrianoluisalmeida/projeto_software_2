<?php

namespace App\Services;

use App\Models\Report;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ReportsService
{

    private $report;

    public function __construct(Report $report)
    {

        $this->report = $report;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->report->all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $validator = $this->validationReport($request);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {

            if ($request->file('photo')) {
                $post = $request->all();
                $file = $request->file('photo');

                //Save image
                $post['photo'] = UploadService::send($file);
                $report = Report::create($post);
            }

            return response()->json($report, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {

        $validator = $this->validationReport($request, $id);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {

            $post = $request->all();

            if (isset($post['image'])) {
                $post['image'] = UploadService::send($request->file('photo'));
            }

            $reportUpdate = Report::find($id);
            $reportUpdate->update($post);


            return response()->json(true, Response::HTTP_OK);
        }
    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validationReport($request, $id = null){

        return Validator::make($request->all(), [
            'description' => 'required',
            'address' => 'max:255',
            'lat' => 'max:255',
            'lng' => 'max:255',
            'category_id' => is_null($id) ? 'required' : '',
            'entity_id' => is_null($id) ? 'required' : '',
            'user_id' => is_null($id) ? 'required' : ''
        ]);

    }

    public function destroy($id){

        dd($id);

    }


}