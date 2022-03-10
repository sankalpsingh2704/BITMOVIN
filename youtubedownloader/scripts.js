//import React from "react";
//import ReactDOM from "react-dom";

class Jumbotron extends React.Component{
	render(){
		return(
			<div className="jumbotron" data-reactid=".1.1.0">
				<h1>Youtube Downloader</h1>      
				<p>Enter Youtube Url and Download</p>
			</div>			
			);
	}
}
class YSearch extends React.Component{
	render(){
		return(
			<div className="row" data-reactid=".1.2.0">
				<div className="row">
					<label className="input-group" htmlFor="youtube_input">Enter Youtube Url:</label>
				</div>
				<div className="row">
					<div className="input-group col-lg-8">
						<input type="text" className="form-control" id="youtube_input" name="youtube_input" placeholder="Enter Youtube Url" />
						<div className="input-group-btn">
							<button className="btn btn-success" type="button">
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
		this.state = {options:""};
	}
	selectBoxChange(e){
		//this.props.changeSequence(e);
	}
	componentDidMount(){
		console.log("Downloader Did Mount");
		var htmlObject = $();
		for(var i=0 ; i< this.props.videoSource.length; i++)
			{
				htmlObject.append(jQuery('<option/>',
				{
					value: i,
					html: this.props.videoSource[i].type
				}));
			}
		this.setState({options:htmlObject});
	}
	render(){
		return(
			<div className="row" data-reactid=".1.3.0">
				<div className="row select-box">
					<label className="input-group" htmlFor="myselect">Select Format:</label>
				</div>
				<div className="row">
					<div className="col-lg-3 input-group">
						<select id="myselect" name="myselect" className="form-control">
							{this.state.options}
						</select>
						<div className="input-group-btn">
							<button className="btn btn-success" type="button">Download</button>
						</div>
					</div>
				</div>
			</div>
		);
	}
}
class VideoLoader extends React.Component{
	render(){
		return(
		<div className="row col-lg-7 form-group video-section" data-reactid=".1.4.0">
			<label htmlFor="myvideo">Video Preview:</label>
			<div className="embed-responsive embed-responsive-16by9">
				<video controls="controls" id="myvideo" poster="youtube-logo.jpg" name="myvideo" className="embed-responsive-item" type={"video/"+this.props.videoSource[this.props.videoSelected].type} src={this.props.videoSource[this.props.videoSelected].url}>
				</video>
			</div>
		</div>
		);
	}
}
class Layout extends React.Component{
				
	constructor()
	{
		super();
		//this.state = {title:"Welcome!"};
		//this.state = {codec:"",url:"",type:""};
		this.state = {data:[],selected:1};
		this.vdata = [];
		this.foo = 0;
		this.title = "sanku"; 
	}

	/*
	getInitialState()
	{
		this.state.data.url = "google";
		this.state.some = [{"url":"www.google.com"},{"Content":"super"}];
	}
	*/
	changeSequence(seq){
		this.setState({selected:seq});
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
		
			if(this.foo != 0)
				return (
					<div data-reactid=".1.0.0">
						<Jumbotron/>
						<YSearch/>
						<Downloader videoSource={this.state.data} changeSequence={this.changeSequence.bind(this)}/>
						<VideoLoader videoSource={this.state.data} videoSelected={this.state.selected} />
					</div>
				);
			else
				return(<p>Please Wait !{this.title}</p>);
			
	}
	componentDidMount()
	{
		console.log("componentDidMount");
		this.getData((value)=>{
			this.foo = 1;
			this.setState({data:value});
		});
		
	}
	componentDidUpdate()
	{
		console.log("componentDidUpdate");
		
	}
}

const app = document.getElementById('root');
ReactDOM.render(<Layout/>,app);