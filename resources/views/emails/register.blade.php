@extends('emails.layout')

@section('content')
    <table style="width:100%;border-collapse:collapse">
        <tbody>
        <tr>
            <td style="font:14px/1.4285714 Arial,sans-serif;padding:0;width:32px;vertical-align:top">

                <img width="32" height="32" alt="aslakshman"
                     src="{{asset('backend/dist/img/user2-160x160.jpg')}}"
                     style="border-radius:3px" class="CToWUd">
            </td>
            <td style="font:14px/1.4285714 Arial,sans-serif;padding:0 0 0 10px">

                <table style="width:100%;border-collapse:collapse">
                    <tbody>
                    <tr>
                        <td style="font:14px/1.4285714 Arial,sans-serif;padding:0;line-height:1">
      <span>
            Your account has been successfully registers with
          <strong>{{get_option('app')}}</strong>
      </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="font:14px/1.4285714 Arial,sans-serif;padding:5px 0 0;font-weight:bold;line-height:1.2">
                            <p>Verify your current account details</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="font:14px/1.4285714 Arial,sans-serif;padding:10px 0 20px">


                            <table style="width:100%;border-collapse:collapse">
                                <tbody>
                                <tr>
                                    <th style="border-bottom:1px solid #ccc;text-align:left;font-weight:bold;padding:5px;">
                                        FUll Name
                                    </th>
                                    <th style="border-bottom:1px solid #ccc;text-align:left;font-weight:bold;padding:5px;">
                                        Email
                                    </th>
                                    <th style="border-bottom:1px solid #ccc;text-align:left;font-weight:bold;padding:5px">
                                        Address
                                    </th>
                                    <th style="border-bottom:1px solid #ccc;text-align:left;font-weight:bold;padding:5px">
                                        Phone
                                    </th>
                                    <th style="border-bottom:1px solid #ccc;text-align:left;font-weight:bold;padding:5px;">
                                        Date
                                    </th>
                                </tr>
                                <tr>
                                    <td style="font:14px/1.4285714 Arial,sans-serif;padding:5px;border-bottom:1px solid #ccc;line-height:24px;color:#707070;">
                                    <span
                                            style="padding:0 0 0 5px; color: rgba(186, 49, 0, 0.90)">Incomplete</span>


                                    </td>
                                    <td style="font:14px/1.4285714 Arial,sans-serif;padding:5px;border-bottom:1px solid #ccc;line-height:24px;color:#707070;font-family:Monaco,monospace;font-size:12px">

                                         <span
                                                 style="padding:0 0 0 5px;">{{$user->email}}</span>
                                    </td>
                                    <td style="font:14px/1.4285714 Arial,sans-serif;padding:5px;border-bottom:1px solid #ccc;line-height:24px;color:#707070">
                                        <span
                                                style="padding:0 0 0 5px; color: rgba(186, 49, 0, 0.90)">Incomplete Address</span>
                                    </td>
                                    <td style="font:14px/1.4285714 Arial,sans-serif;padding:5px;border-bottom:1px solid #ccc;line-height:24px;color:#707070;">
                                        <div>
                                                                               <span
                                                                                       style="padding:0 0 0 5px;">{{$user->phone}}</span>
                                        </div>
                                    </td>
                                    <td style="font:14px/1.4285714 Arial,sans-serif;padding:5px;border-bottom:1px solid #ccc;line-height:24px;color:#707070;">
                                        <div>
                                                                                <span class="aBn"
                                                                                      data-term="goog_492599922"
                                                                                      tabindex="0"><span
                                                                                            class="aQJ">{{$user->created_at->diffForHumans()}}</span></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"
                                        style="font:14px/1.4285714 Arial,sans-serif;padding:10px 0 0;border-top:1px solid #cccccc;line-height:1">
                                        Its Look like you haven't updated your profile. Please update it from your
                                        your <a href="{{route('account',$user->name)}}"
                                                style="color:#3572b0;text-decoration:none" target="_blank"> account </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@endsection