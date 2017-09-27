<?php
namespace App\Presenter;

class address_presenter{
    /**
     * 地址清單
     * @param object $_object 資料物件
     */
    public function addressList($_object,$_DefaultID)
    {
        $DefaultID='';
        $Default='';
        $datalength=0;
        //輸出物件
        $html = '<table class="table table-bordered table-condensed" style="background-color: #ffffff;">';
        $_object = reSetKey($_object);
        // dd($_object);
        foreach($_object as $typeID => $row){
            if($row->addressee != ''){
                $datalength++;
                if($_DefaultID==$typeID){$Default= trans('view.AddressList.th.showmain');$DefaultID='1';}else{$Default="";$DefaultID='0';}
                $html .='
                        <tbody style="border-top: 10px solid #f0f0f0; font-size: 4.5vw;">
                            <tr>
                                <td style="width: 20%;text-align: right;vertical-align: middle;">
                                    '. trans('view.AddressList.th.addressee') .'<span style="display:none" id="typeID'.$typeID.'">'.$typeID.'</span>
                                </td>
                                <td style="width: 25%;text-align: left;vertical-align: middle;" id="addressee'.$typeID.'">
                                    '.$row->addressee.'
                                </td>
                                <td style="width: 20%;text-align: center;vertical-align: middle;">
                                    '. trans('view.AddressList.th.phonebr') .'
                                </td>
                                <td style="text-align: left;vertical-align: middle;" id="phone'.$typeID.'">
                                    '.$row->phone.'
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;vertical-align: middle;">
                                    '. trans('view.AddressList.th.addressbr') .'
                                </td>
                                <td  style="text-align: left;vertical-align: middle;" colspan="3" id="address'.$typeID.'">'.$row->address.'</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="fontred" style="font-size: 6vw; text-align: center; vertical-align: middle;">'.$Default.'<span style="display:none" id="Default'.$typeID.'">'.$DefaultID.'</span></td>
                                <td><a id="index'.$typeID.'" name="changeA" class="button button-flat-primary button-large  button-block" style="padding: 0; font-size: 4vw;"><span class="glyphicon glyphicon-pencil"></span>'. trans('view.AddressList.b.update') .'</a></td>
                                <td><a id="delete'.$typeID.'" name="delete" class="button button-flat-primary button-large  button-block" style="padding: 0px; font-size: 4vw;"><span class="glyphicon glyphicon-trash"></span>'. trans('view.AddressList.b.delete') .'</a></td>
                            </tr>
                        </tbody>
                    ';
            }
        }
        $html .= '</table>';
        $html .= '<span style="display:none" id="datalength">'.$datalength.'</span>';
        return $html;
    }
        public function selectaddress($_object,$_DefaultID)
    {
        $DefaultID='';
        $Default='';
        //輸出物件
        $html = '<table class="table table-bordered table-condensed" style="background-color: #ffffff;">';
        $_object = reSetKey($_object);
        // dd($_object);
        foreach($_object as $typeID => $row){
            if($row->addressee != ''){
                if($_DefaultID==$typeID){$Default=trans('view.AddressList.th.showmain');$DefaultID='1';}else{$Default="";$DefaultID='0';}
                $html .='
                        <tbody style="border-top: 10px solid #f0f0f0; font-size: 4.5vw;">
                            <tr>
                                <td style="width: 20%;text-align: right;vertical-align: middle;">
                                    '. trans('view.AddressList.th.addressee') .'<span style="display:none" id="typeID'.$typeID.'">'.$typeID.'</span>
                                </td>
                                <td style="width: 25%;text-align: left;vertical-align: middle;" id="addressee'.$typeID.'">
                                    '.$row->addressee.'
                                </td>
                                <td style="width: 20%;text-align: center;vertical-align: middle;">
                                    '. trans('view.AddressList.th.phonebr') .'
                                </td>
                                <td style="text-align: left;vertical-align: middle;" id="phone'.$typeID.'">
                                    '.$row->phone.'
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;vertical-align: middle;">
                                    '. trans('view.AddressList.th.addressbr') .'
                                </td>
                                <td  style="text-align: left;vertical-align: middle;" colspan="3" id="address'.$typeID.'">'.$row->address.'</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="fontred" style="font-size: 6vw; text-align: center; vertical-align: middle;">'.$Default.'<span style="display:none" id="Default'.$typeID.'">'.$DefaultID.'</span></td>
                                <td colspan="2"><a  id="select'.$typeID.'" name="select" class="button button-flat-primary button-large  button-block" style="padding-left: 15px;padding-right: 15px;"><span class="glyphicon glyphicon-ok"></span>'. trans('view.AddressList.b.select') .'</a></td>
                            </tr>
                        </tbody>
                    ';
            }
        }
        $html .= '</table>';
        return $html;
    }
}