//import React from "react";
//import ReactDOM from "react-dom";

class Jumbotron extends React.Component{
	render(){
		return(
			<div className="jumbotron" data-reactid=".1.1.0">
				<h1>Youtube Downloader React</h1>      
				<p>Enter Youtube Url and Download</p>
				<small><img src="reactlogo.png" height="20" width="20" />*React Super Powered</small>
			</div>			
			);
	}
}
class YSearch extends React.Component{
	constructor(){
		super();
		this.searchString = "";
		this.key = "I5UBikauIQM";
	}
	searchData(e){
		this.searchString = e.target.value;
	}
	requestData(){
		console.log("click:"+this.searchString);
		var pattern = /^(ftp|http|https):\/\/[^ "]+$/;
		if(pattern.test(this.searchString))
		{
			var pat = new RegExp('v=');
			if(!pat.test(this.searchString))
				swal("Invalid", "Not a Valid Youtube Url", "error");
			else
			{
				this.key = this.searchString.split("=")[1];
				console.log("click:"+this.key);
				this.props.setSliderState(true);
				this.props.requestData(this.key);
				this.props.getThumbnail(this.key);
			}
				
		}
		else
			swal("Invalid", "Not a Valid Web Url", "error");
	}
	render(){
		return(
			<div className="row" data-reactid=".1.2.0">
				<div className="row">
					<label className="input-group" htmlFor="youtube_input">Enter Youtube Url:</label>
				</div>
				<div className="row">
					<div className="input-group col-lg-8">
						<input type="text" className="form-control" id="youtube_input" name="youtube_input" placeholder="Enter Youtube Url" onBlur={this.searchData.bind(this)} />
						<div className="input-group-btn">
							<button className="btn" type="button" onClick={this.requestData.bind(this)}>
								<i className="glyphicon glyphicon-search"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		);
	}
}
class Downloader extends React.Component{
	constructor(){
		super();
		this.state = {options:[]};
	}
	selectBoxChange(e){
		this.props.changeSequence(e.target.value);
	}
	populate(vdata)
	{
		var optionslist = [];
		for(var i=0 ; i< vdata.length; i++)
			{
				optionslist.push(vdata[i].type.toUpperCase());
			}
		this.setState({options:optionslist});
	}
	componentWillReceiveProps(nextProps){
		console.log("Downloader WillReceiveProps");
		//console.log(nextProps.videoSource);
		this.populate(nextProps.videoSource);
	}
	componentWillMount()
	{
		console.log("Downloader Will Mount");
	}
	componentDidMount(){
		console.log("Downloader Did Mount");
		this.populate(this.props.videoSource);	
	}
	componentDidUpdate()
	{
		console.log("downloaderDidUpdate");
	}
	render(){
		return(
			<div className="row" data-reactid=".1.3.0">
				<div className="row select-box">
					<label className="input-group" htmlFor="myselect">Select Format:</label>
				</div>
				<div className="row">
					<div className="col-lg-3 input-group">
						<select id="myselect" name="myselect" className="form-control" onChange={this.selectBoxChange.bind(this)}>
							<option value="">Select Format</option>
							{
								this.state.options.map(function(user,index,arr) {
       							return (<option key={index}
          							value={index}>{arr[index]}</option>);
      							})
							}
						</select>
						<div className="input-group-btn">
							<a className="btn" href={this.props.videoSource[this.props.videoSelected].url} download={"videodownload."+this.props.videoSource[this.props.videoSelected].type}>Download</a>
						</div>
					</div>
				</div>
			</div>
		);
	}
}
class VideoLoader extends React.Component{
	componentDidMount(){
		console.log("VideoLoaderMount");
	}
	getSliderState(sliderState){
		return (sliderState == true)?"slider-active":"";
	}
	render(){
		return(
		<div className="row col-lg-7 form-group video-section" data-reactid=".1.4.0">
			<label htmlFor="myvideo">Video Preview:</label>
			<div className={"slider "+ this.getSliderState(this.props.sliderState)}>
				<div className="line"></div>
				<div className="break dot1"></div>
				<div className="break dot2"></div>
				<div className="break dot3"></div>
			</div>
			<div className="embed-responsive embed-responsive-4by3">
				<video controls="controls" id="myvideo" poster={this.props.thumbnail} name="myvideo" className="embed-responsive-item" type={"video/"+this.props.videoSource[this.props.videoSelected].type} src={this.props.videoSource[this.props.videoSelected].url}>
				</video>
			</div>
		</div>
		/*function(){
					return (this.props.sliderState == true)?"slider-active":"";
				}}>*/
		);
	}
}
class Layout extends React.Component{
				
	constructor()
	{
		super();
		this.state = {data:[{codec:"\"vp8.0, vorbis\"",type:"mp4",url:"http://www.quirksmode.org/html5/videos/big_buck_bunny.mp4"}],selected:0,thumbnail:"buckbunny.png",slider:false};
		this.vdata = [];
	}
	changeSequence(seq){
		this.setState({selected:seq});
	}
	setSliderState(sliderState){
		this.setState({slider:sliderState});
	}
	getThumbnail(id){
		fetch("https://www.googleapis.com/youtube/v3/search?part=snippet&q="+id+"&key=AIzaSyBuTpSrhoBtmSVjr3kurXSlPjrALZJnqhU").then((response)=>{ 
   				return response.json();
			}).then((text)=>{
				this.setState({thumbnail:text.items[0].snippet.thumbnails.high.url});
		});
	}
	requestData(key){
		var result = fetch("youtube.php?id="+key).then((response)=>{
					console.log('header', response.headers.get('Content-Type'));
					const jsvalue = response.json();
					return jsvalue;
				}).then((text)=>{
					this.setState({data:text,selected:1});
					this.setSliderState(false);			
			});
	}
	getData(callback){
				var result = fetch("youtube.php?id=I5UBikauIQM").then(function(response){
					console.log('header', response.headers.get('Content-Type'));
					const jsvalue = response.json();
					return jsvalue;
				}).then(function(text){
					callback(text);
					
			});
	}
	componentWillMount()
	{
		console.log("componentWillMount");
	}
	onhd(e)
	{
		alert("button clicked :"+e.target.textContent);
	}
	render(){
				return (
					<div data-reactid=".1.0.0">
						<Jumbotron/>
						<YSearch requestData={this.requestData.bind(this)} getThumbnail={this.getThumbnail.bind(this)} setSliderState={this.setSliderState.bind(this)} />
						<Downloader videoSource={this.state.data} videoSelected={this.state.selected} changeSequence={this.changeSequence.bind(this)} />
						<VideoLoader videoSource={this.state.data} videoSelected={this.state.selected} thumbnail={this.state.thumbnail} sliderState={this.state.slider} />
					</div>
				);
	}
	componentDidMount()
	{
		console.log("componentDidMount");
		/*this.getData((value)=>{
			this.setState({data:value});
		});*/
	}
	componentDidUpdate()
	{
		console.log("componentDidUpdate");
		
	}
}
const app = document.getElementById('root');
ReactDOM.render(<Layout/>,app);