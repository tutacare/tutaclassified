
<div class="panel panel-info">
           <div class="panel-heading">
             <h3 class="panel-title">{{$user->name}}</h3>
           </div>
           <div class="panel-body">
             <div class="row">
               <div class="col-md-3 col-lg-3 " align="center"> <img alt="{{$user->name}}" src="/images/user/{{$user->foto}}" class="img-circle img-responsive"> </div>

               <div class=" col-md-9 col-lg-9 ">
                 <table class="table table-user-information">
                   <tbody>
                     <tr>
                       <td>Email:</td>
                       <td>{{$user->email}}</td>
                     </tr>
                     <tr>
                       <td>Username:</td>
                       <td>{{$user->username}}</td>
                     </tr>
                     <tr>
                       <td>No. Telp</td>
                       <td>{{$user->phone}}</td>
                     </tr>

                        <tr>
                          @if($user->address <> null)
                            <tr>
                       <td>Alamat</td>
                       <td>{{$user->address}}</td>
                     </tr>
                     @endif
                       <tr>
                       <td>Kota</td>
                       <td>{{$user->city->city}}</td>
                     </tr>
                     <tr>
                       <td>Provinsi</td>
                       <td>{{$user->city->province->province}}</td>
                     </tr>
                     <tr>
                       <td>Saldo</td>
                       <td>{{$user->balance}}</td>
                     </tr>


                   </tbody>
                 </table>


               </div>
             </div>
           </div>
                <div class="panel-footer">
                       <a data-toggle="tooltip" data-placement="right" title="Kirim Pesan" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                       <span class="pull-right">

                           {!! Form::open(array('url' => 'dashboard/admin/user/' . $user->id)) !!}
                               {!! Form::hidden('_method', 'DELETE') !!}
                               <a href="{{ URL::to('dashboard/admin/user/' . $user->id . '/edit') }}" data-toggle="tooltip" data-placement="left" title="Ganti Data Pengguna" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                               <button data-toggle="modal" title="Hapus Pengguna" data-target="#confirmDelete" data-placement="right" title="Hapus" class="btn btn-sm btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                           {!! Form::close() !!}

                       </span>
                   </div>
</div>
