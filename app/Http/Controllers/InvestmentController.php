<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\PropertiesCampaign;
use Validator;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created investment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json();
        $rules = array(
            'user_id' => 'required',
            'property_id' => 'required',
            'amount_invested' => 'required'
        );
        $customMessages = ['required' => 'The :attribute field is required.'];
        $validator = Validator::make($data->all() , $rules, $customMessages);

        if ($validator->fails())
        {
            $err = array();
            foreach ($validator->errors()
                ->toArray() as $error)
            {
                foreach ($error as $sub_error)
                {
                    array_push($err, $sub_error);
                }
            }
            return response()->json(['status' => 0, 'errors' => $err], 200);
        }
        else
        {
            $userId = $data->get('user_id') ? $data->get('user_id') : 0;
            $propertyId = $data->get('property_id') ? $data->get('property_id') : 0;
            $amountInvested = $data->get('amount_invested') ? $data->get('amount_invested') : 0;
            try
            {
                // getting camapign details from property_id
                $propertiesCampaigns = PropertiesCampaign::with('campaign')->where('property_id', $propertyId)->get();
                if ($propertiesCampaigns->isNotEmpty())
                {
                    $propertiesCampaign = $propertiesCampaigns->pluck('campaign');
                    $investmentMultiple = $propertiesCampaign[0]->investment_multiple;
                    $isInvestmentMultiple = $this->checkIfMult($amountInvested, $investmentMultiple);
                    if ($isInvestmentMultiple)
                    {
                        $investment = Investment::create(['user_id' => $userId, 'property_id' => $propertyId, 'amount_invested' => $amountInvested]);
                        if ($investment)
                        {
                            return response()->json(['status' => 1, 'data' => $investment], 201);
                        }
                    }
                    else
                    {
                        return response()->json(['status' => 0, 'errors' => 'Please invest multiple of ' . $investmentMultiple]);
                    }
                }
                else
                {
                    return response()->json(['status' => 0, 'errors' => 'No active campaigns for this property.']);
                }
            }
            catch(QueryException $ex)
            {
                return response()->json(['status' => 0, 'errors' => $ex->errorInfo[2]]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
    }

    /**
     * check two numbers multiple of other.
     *
     */
    function checkIfMult($input, $toBeChecked)
    {
        $_number = $input / $toBeChecked;
        if (abs(floor($_number) - $_number) < 0.00001)
        {
            return true;
        }
        return false;
    }
}

