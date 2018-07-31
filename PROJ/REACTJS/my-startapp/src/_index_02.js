import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';

function ShowWarning(props){
	if(!props.display){
		return null;
	}
	else {
		return <div>show content</div>;
	}
}

class Button extends React.Component {
	constructor(props){
		super(props);
		this.state = {
			buttonVal : true
		}
		
		this.handleButtonClick = this.handleButtonClick.bind(this);
	}
	
	handleButtonClick(){
		this.setState(prevState => ({
			buttonVal: !prevState.buttonVal
		}));
	}
	
	buttonValue(){
		
	}
	
	render(){
		return (
			<div>
				<button onClick={this.handleButtonClick}>
					{this.state.buttonVal ? 'Hide' : 'Show'}
				</button>
				<ShowWarning display={this.state.buttonVal} />
			</div>
		);
	}
}


//render
ReactDOM.render(
	<Button />,
	document.getElementById('root')
);