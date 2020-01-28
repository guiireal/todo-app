import React, {Component} from 'react';

class Index extends Component {
  toCssClasses(numbers) {
    const cols = numbers ? numbers.split(' ') : [];
    let classes = '';
    if (cols[0]) classes += `col-sm-${cols[0]}`;
    if (cols[1]) classes += ` col-md-${cols[1]}`;
    if (cols[2]) classes += ` col-lg-${cols[2]}`;
    if (cols[3]) classes += ` col-xl-${cols[3]}`;
    return classes;
  }

  render() {
    const {cols, children} = this.props;
    const gridClasses = this.toCssClasses(cols || 12);
    return (
      <div className={gridClasses}>
        {children}
      </div>
    );
  }
}

export default Index;