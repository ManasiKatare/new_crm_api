<?php

namespace Modules\CloudTelephony\Transformers\Exotel;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\JsonResource;

class VoiceCallDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $objReturnValue=null;
        try {
            $callDuration = null;
            $callDirection = (isset($this['Direction']) && ($this['Direction']=='inbound'))?'telephony_direction_incoming':'telephony_direction_outgoing';
            $urlRecording = null;

            //Call Status
            $callStatus = (isset($this['Status']))?$this['Status']:null;
            switch ($callStatus) {
                case 'queued':
                    $callStatus = 'telephony_call_status_type_queued';
                    break;

                case 'ringing':
                    $callStatus = 'telephony_call_status_type_queued';
                    break;

                case 'in-progress':
                    $callStatus = 'telephony_call_status_type_in_progress';
                    break;

                case 'completed':
                    $callStatus = 'telephony_call_status_type_completed';
                    $callDuration = (isset($this['Duration']))?($this['Duration']):0;
                    $urlRecording = (isset($this['RecordingUrl']))?($this['RecordingUrl']):null;
                    break;

                case 'failed':
                    $callStatus = 'telephony_call_status_type_failed';
                    break;

                case 'busy':
                    $callStatus = 'telephony_call_status_type_busy';
                    break;

                case 'no-answer':
                    $callStatus = 'telephony_call_status_type_no_answer';
                    break;
                
                default:
                    $callStatus = 'telephony_call_status_type_failed';
                    break;
            } //End Switch
            
            $objReturnValue = [
                'transaction_id'    => $this['Sid'],
                'direction'         => $callDirection,
                'status'            => $callStatus,
                'recording_url'     => $urlRecording,
                'duration'          => $callDuration,
                'uri'               => isset($this['Uri'])?$this['Uri']:null,
                'created_at'        => isset($this['StartTime'])?$this['StartTime']:null,
                'updated_at'        => isset($this['DateUpdated'])?$this['DateUpdated']:null,
                'to_number'         => isset($this['To'])?$this['To']:null,
                'from_number'       => isset($this['From'])?$this['From']:null,
                // 'proxy'             => isset($this['digits'])?$this['digits']:'0',
                // 'whom_number'       => ''
            ];
        } catch(Exception $e) {
            $objReturnValue=null;
        }
        return $objReturnValue;
    } //Function ends
}
