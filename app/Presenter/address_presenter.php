<?php
namespace App\Presenter;

class address_presenter{

    /**
     * 地址清單
     * @param object $_object 資料物件
     */
    public function addressList($_object, $_defaultID, $_notPick=true)
    {
        //輸出物件
        $html = '';
        foreach($_object as $key => $row){
            if($row->addressee != '' && $row->address != '' && $row->phone != ''){
                $html .= '  <div class="panel panel-success">';

                //是否為預設
                if($key == $_defaultID){
                    $html .= '  <div class="panel-heading">
                                    <h2 class="panel-title" align="center" style="font-size: 110%;">
                                        '. trans('view.addressList.cl.master'). '
                                    </h2>
                                </div>';
                }
                $html .= '      <div class="panel-body">
                                    <div class="row">
                                        <div class="span4">
                                            '. trans('view.addressList.cl.name'). '
                                        </div>
                                        <div class="span8">
                                            '. $row->addressee. '
                                        </div>
                                        <div class="span4">
                                            '. trans('view.addressList.cl.address'). '
                                        </div>
                                        <div class="span8">
                                            '. $row->address. '
                                        </div>
                                        <div class="span4">
                                            '. trans('view.addressList.cl.phone'). '
                                        </div>
                                        <div class="span8">
                                            '. $row->phone. '
                                        </div>
                                    </div>
                                </div>';
                $html .= '      <div class="panel-footer">
                                    <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">';

                //是否為選取
                if($_notPick){
                    $html .= '              <a href="/AddressListDel?addressID='. $key. '"
                                               class="button button-flat-caution btn-group btn-group-xs WaitingBtn" role="button">
                                                '. trans('view.b.delete'). '
                                            </a>';

                    ////是否為預設、不是才能修改預設
                    if($key != $_defaultID){
                        $html .= '          <a href="/AddressListMas?addressID='. $key. '"
                                               class="button button-flat-action btn-group btn-group-xs WaitingBtn" role="button">
                                                '. trans('view.addressList.b.master'). '
                                            </a>';
                    }

                    $html .= '              <a href="/AddressListCha?addressID='. $key. '"
                                               class="button button-flat-primary btn-group btn-group-xs WaitingBtn" role="button">
                                                '. trans('view.b.edit'). '
                                            </a>';
                }
                else{
                    $html .= '              <a href="/AddressListPic?addressID='. $key.
                                                                    '&name='. $row->addressee. '&phone='. $row->phone.
                                                                    '&address='. $row->address. '"
                                               class="button button-flat-primary btn-group btn-group-xs WaitingBtn" role="button">
                                                '. trans('view.b.redio'). '
                                            </a>';
                }

                $html .= '          </div>
                                </div>
                            </div>';
            }//
        }

        return $html;
    }
}