import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';


function FormattedDate(props) {
	return <span>Posted on {props.date.toLocaleDateString()}</span>;
}

class Comment extends React.Component {
	constructor(props) {
		super(props);
		this.state = {
			date: new Date(),
			author: {
				name: 'Kevin Ralph',
				avatar: 'http://placekitten.com/g/64/64',
				text: 'Hellow World'
			}
		}
	}
	
	render (){
		return(
			<div>
				<div>
					<img
						src={this.state.author.avatar}
						alt={this.state.author.name}
					/>
				</div>
				<div>
					<p>{this.state.author.name}</p>
					<p>{this.state.author.text}</p>
					<p><FormattedDate date={this.state.date} /></p>
				</div>
			</div>
		);
	}
	
	componentDidMount() {
		this.followup();
	}
	
	componentWillUnmount() {
		
	}
	
	followup(){
		console.log(1)
		//change value of set State
		this.setState({
			author: {
				name: 'Ralph Iglesias',
				avatar: 'http://placekitten.com/g/64/64',
				text: 'Hellow World'
			}
		})
	}
	
}



//render
ReactDOM.render(
	<Comment />,
	document.getElementById('root')
);