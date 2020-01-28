const If = ({children, test}) => {
  if (test) return children;
  return false;
};

export default If;
