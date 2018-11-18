<?php

namespace App\Http\Controllers;
use Validator, Hash;
use App\ServiceProvider, App\Service, App\Provider, App\Rating, App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class ProviderController extends Controller
{
  function getStore()
  {
    $service = Service::where('name','Store')->first();
    $services="";
    if (strtoupper(auth()->user()->role)=="USER")
    {
      $people = People::where('user_id',auth()->user()->id)->first();
      $city = $people->city;
      $services = ServiceProvider::where('service_id',$service->id)->where('city',$city)->orderBy('rating','desc')->get()->all();
    }
    else {
    $services = ServiceProvider::where('service_id',$service->id)->orderBy('rating','desc')->get()->all();
    }
    //dd($services);
    $count = count($services);
    //dd($count);
    return view('provider.store')->with('message','')->with('services',$services)->with('count',$count);
  }
  function getStoreProfile($serviceid,$providerid)
  {
      $store = ServiceProvider::where('service_id',$serviceid)->where('provider_id',$providerid)->first();
      if (strtoupper(auth()->user()->role)=="USER"){
      $rating = Rating::where('sp_id',$store->id)->first();
      $decision=0;
      if($rating)
      {
        $decision=0;
      }
      $person = People::where('user_id',auth()->user()->id)->first();
      $location = $person->address.",".$person->city.",".$person->country;
      return view('provider.storeprofile')->with('message','')->with('provider',$store)->with('alreadyrated',$decision)->with('location',$location);
      }
      else {
        return view('provider.storeprofile')->with('message','')->with('provider',$store)->with('location','');
      }

  }
  function getPlumber()
  {
    $service = Service::where('name','Plumber')->first();
    //dd($service);
    $services="";
    if (strtoupper(auth()->user()->role)=="USER")
    {
      $people = People::where('user_id',auth()->user()->id)->first();
      $city = $people->city;
      $services = ServiceProvider::where('service_id',$service->id)->where('city',$city)->orderBy('rating','desc')->get()->all();
      //dd($services);
    }
    else {
    $services = ServiceProvider::where('service_id',$service->id)->orderBy('rating','desc')->get()->all();
    }
    //dd($services);
    $count = count($services);
    //dd($count);
    return view('provider.plumber')->with('message','')->with('services',$services)->with('count',$count);
  }
  function getPlumberProfile($serviceid,$providerid)
  {
      $plumber = ServiceProvider::where('service_id',$serviceid)->where('provider_id',$providerid)->first();
      if (strtoupper(auth()->user()->role)=="USER"){
      $rating = Rating::where('sp_id',$plumber->id)->first();
      $decision=0;
      if($rating)
      {
        $decision=0;
      }
      $person = People::where('user_id',auth()->user()->id)->first();
      $location = $person->address.",".$person->city.",".$person->country;
      return view('provider.plumberprofile')->with('message','')->with('provider',$plumber)->with('alreadyrated',$decision)->with('location',$location);
      }
      else {
        return view('provider.plumberprofile')->with('message','')->with('provider',$plumber)->with('location','');
      }

  }
  function getLaundry()
  {
    $service = Service::where('name','Laundry')->first();
    //dd($service);
    $services="";
    if (strtoupper(auth()->user()->role)=="USER")
    {
      $people = People::where('user_id',auth()->user()->id)->first();
      $city = $people->city;
      $services = ServiceProvider::where('service_id',$service->id)->where('city',$city)->orderBy('rating','desc')->get()->all();
      //dd($services);
    }
    else {
    $services = ServiceProvider::where('service_id',$service->id)->orderBy('rating','desc')->get()->all();
    }
    //dd($services);
    $count = count($services);
    //dd($count);
    return view('provider.laundry')->with('message','')->with('services',$services)->with('count',$count);
  }
  function getLaundryProfile($serviceid,$providerid)
  {
      $laundry = ServiceProvider::where('service_id',$serviceid)->where('provider_id',$providerid)->first();
      if (strtoupper(auth()->user()->role)=="USER"){
      $rating = Rating::where('sp_id',$laundry->id)->first();
      $decision=0;
      if($rating)
      {
        $decision=0;
      }
      $person = People::where('user_id',auth()->user()->id)->first();
      $location = $person->address.",".$person->city.",".$person->country;
      return view('provider.laundryprofile')->with('message','')->with('provider',$laundry)->with('alreadyrated',$decision)->with('location',$location);
      }
      else {
        return view('provider.laundryprofile')->with('message','')->with('provider',$laundry)->with('location','');
      }

  }
  function getMechanic()
  {
    $service = Service::where('name','Mechanic')->first();
    //dd($service);
    $services="";
    if (strtoupper(auth()->user()->role)=="USER")
    {
      $people = People::where('user_id',auth()->user()->id)->first();
      $city = $people->city;
      $services = ServiceProvider::where('service_id',$service->id)->where('city',$city)->orderBy('rating','desc')->get()->all();
      //dd($services);
    }
    else {
    $services = ServiceProvider::where('service_id',$service->id)->orderBy('rating','desc')->get()->all();
    }
    //dd($services);
    $count = count($services);
    //dd($count);
    return view('provider.mechanic')->with('message','')->with('services',$services)->with('count',$count);
  }
  function getMechanicProfile($serviceid,$providerid)
  {
      $mechanic = ServiceProvider::where('service_id',$serviceid)->where('provider_id',$providerid)->first();
      if (strtoupper(auth()->user()->role)=="USER"){
      $rating = Rating::where('sp_id',$mechanic->id)->first();
      $decision=0;
      if($rating)
      {
        $decision=0;
      }
      $person = People::where('user_id',auth()->user()->id)->first();
      $location = $person->address.",".$person->city.",".$person->country;
      return view('provider.mechanicprofile')->with('message','')->with('provider',$mechanic)->with('alreadyrated',$decision)->with('location',$location);
      }
      else {
        return view('provider.mechanicprofile')->with('message','')->with('provider',$mechanic)->with('location','');
      }

  }
  function getCarpenter()
  {
    $service = Service::where('name','Carpenter')->first();
    //dd($service);
    $services="";
    if (strtoupper(auth()->user()->role)=="USER")
    {
      $people = People::where('user_id',auth()->user()->id)->first();
      $city = $people->city;
      $services = ServiceProvider::where('service_id',$service->id)->where('city',$city)->orderBy('rating','desc')->get()->all();
      //dd($services);
    }
    else {
    $services = ServiceProvider::where('service_id',$service->id)->orderBy('rating','desc')->get()->all();
    }
    //dd($services);
    $count = count($services);
    //dd($count);
    return view('provider.carpenter')->with('message','')->with('services',$services)->with('count',$count);
  }
  function getCarpenterProfile($serviceid,$providerid)
  {
      $carpenter = ServiceProvider::where('service_id',$serviceid)->where('provider_id',$providerid)->first();
      if (strtoupper(auth()->user()->role)=="USER"){
      $rating = Rating::where('sp_id',$carpenter->id)->first();
      $decision=0;
      if($rating)
      {
        $decision=0;
      }
      $person = People::where('user_id',auth()->user()->id)->first();
      $location = $person->address.",".$person->city.",".$person->country;
      return view('provider.carpenterprofile')->with('message','')->with('provider',$carpenter)->with('alreadyrated',$decision)->with('location',$location);
      }
      else {
        return view('provider.carpenterprofile')->with('message','')->with('provider',$carpenter)->with('location','');
      }

  }
  function getElectrician()
  {
    $service = Service::where('name','Electrician')->first();
    //dd($service);
    $services="";
    if (strtoupper(auth()->user()->role)=="USER")
    {
      $people = People::where('user_id',auth()->user()->id)->first();
      $city = $people->city;
      $services = ServiceProvider::where('service_id',$service->id)->where('city',$city)->orderBy('rating','desc')->get()->all();
      //dd($services);
    }
    else {
    $services = ServiceProvider::where('service_id',$service->id)->orderBy('rating','desc')->get()->all();
    }
    //dd($services);
    $count = count($services);
    //dd($count);
    return view('provider.electrician')->with('message','')->with('services',$services)->with('count',$count);
  }
  function getElectricianProfile($serviceid,$providerid)
  {

      $electrician = ServiceProvider::where('service_id',$serviceid)->where('provider_id',$providerid)->first();
      if (strtoupper(auth()->user()->role)=="USER"){
      $rating = Rating::where('sp_id',$electrician->id)->first();
      $decision=0;
      if($rating)
      {
        $decision=0;
      }
      $person = People::where('user_id',auth()->user()->id)->first();
      $location = $person->address.",".$person->city.",".$person->country;
      return view('provider.electricianprofile')->with('message','')->with('provider',$electrician)->with('alreadyrated',$decision)->with('location',$location);
      }
      else {
        return view('provider.electricianprofile')->with('message','')->with('provider',$electrician)->with('location','');
      }

  }

  function getProviderProfile(){
    if(strtoupper(auth()->user()->role)=="PROVIDER"){
    return view('provider.profile')->with('user',auth()->user())->with('message', ' ');
    }
    else return back()->with('message', ' ');
  }
    function postProviderProfile(Request $request){
      if(strtoupper(auth()->user()->role)=="PROVIDER"){
      $user = auth()->user();
            $validator = Validator::make($request->all(), [
              'email' => 'required|max:255',
              'name' => 'required',
              'newpassword' => 'max:25',
              'password' => 'required|max:25',
          ]);
          if ($validator->fails()) {
              return back()->withErrors($validator)->withInput()->with('message',"Try Again");
          }
          else {
            if (Hash::check($request->password,$user->password)){
              $file = Input::file('profileimage');
              if ($file){
              $file->move(public_path().'/images/',$user->id.'.jpg');
              $user->image = $user->id.".jpg";
              }
              $user->mobile = $request->mobile;
              $user->name = $request->name;
              if($request->newpassword){
              $user->password = bcrypt($request->newpassword);
              }
              $user->save();
              return back()->with('message',"Successfully Saved");
              }
            else {
              return back()->with('message', "Current Password Does Not Match");
            }
          }
        }
        else return back()->with('message', ' ');
    }

    function getServiceProvider(){
      if(strtoupper(auth()->user()->role)=="PROVIDER"){
      $services = Service::get()->all();
      $provider = Provider::where('user_id','=',auth()->user()->id)->first();
      $providedservices = ServiceProvider::select('service_providers.service_id','service_providers.provider_id','services.name','service_providers.address','service_providers.city',
      'service_providers.country','service_providers.description','service_providers.service_provider_image','service_providers.mobile','service_providers.email','service_providers.website','service_providers.rating','service_providers.rating_count')->join('services','service_providers.service_id','=','services.id')->
      where('provider_id','=', $provider->id)->get();
      return view('provider.service')->with('message', ' ')->with('services', $services)->with('provider',$provider)->with(
        'providedservices', $providedservices);
    }
    else return back()->with('message', ' ');
    }
    function postServiceProvider(Request $request){
      //dd($request->all());
      if(strtoupper(auth()->user()->role)=="PROVIDER"){
      $validator = Validator::make($request->all(), [
        'sid' => 'required',
        'pid' => 'required',
        'address' => 'required',
        'country' => 'required|max:25',
        'city' => 'required|max:25',
        'description' => 'required|max:255',
        'service_provider_image' => 'required'
      ]);
      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput()->with('message',"Try Again");
      }
      else{

            $tmpserviceprovider = ServiceProvider::where('service_id','=',$request->sid)->where('provider_id','=',$request->pid)->get()->first();
            //dd($tmpserviceprovider); Data proper

            if ($tmpserviceprovider){
              return back()->with('message','This Service is Already Added You can only Edit');
              //dd($request->all());
            }
            else{
              $file = Input::file('service_provider_image');
              $filepath = "";
              //dd($file);
              if ($file){
              $file->move(public_path().'/images/',$request->pid."-".$request->sid.'.jpg');
              $filepath = $request->pid."-".$request->sid.'.jpg';

              }
              //dd($filepath);
            $serviceprovider = ServiceProvider::create(
               ['service_id' => $request->sid,
               'provider_id' => $request->pid,
               'address' => $request->address,
               'city' => $request->city,
               'country' => $request->country,
               'description' => $request->description,
               'service_provider_image' => $filepath,
               'mobile' => $request->mobile,
               'email' => $request->email,
               'website' => $request->website,
            ]);
            //dd($serviceprovider);
            //Increment Service count
            //Don't use first with find it returns first element.
            if ($serviceprovider) {
              $service = Service::find($serviceprovider->service_id);
              //dd($service);
              $service->count = $service->count + 1;
              $service->save();
              return back()->with('message', 'Service Provider Added Successfully');
            }
            else {
              return back()->with('message', 'Service Provider Could Not be Added Try Again!');
            }
        }

      }
    }
    else {
      return back()->with('message', "Welcome to Service Provider");
    }
  }
  function deleteServiceProvider($serviceid, $providerid)
  {
    if (strtoupper(auth()->user()->role)=="PROVIDER")
    {
      $serviceprovider = ServiceProvider::where('service_id','=',$serviceid)->where('provider_id','=',$providerid)->get()->first();
      if ($serviceprovider) {
        //dd($serviceprovider);
        $service = Service::find($serviceprovider->service_id);
        $service->count = $service->count - 1;
        //dd($service);
        $service->save();
      }
      $serviceprovider->delete();
      return back()->with('message',"Successfully delete the record");
    }
    else return back()->with('message', "You are not allowed to access this route");
  }

}
