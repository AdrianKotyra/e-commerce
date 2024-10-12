import './benchmarkStyles.css';
const Benchmark = ({ providerName, sumBenchmark, sumPayments, difference }) => {
    return (
      <div className="benchmark-card">
        <h3><b>{providerName}</b></h3>
        <p>Years : 2021-2024</p>
        <p>Total Benchmark: {sumBenchmark}€</p>
        <p>Total Payments: {sumPayments}€</p>
        <p className={difference>=0?'overBench' : 'underBench' }>Difference: {difference}€</p>
      
      </div>
    );
  };
  
  export default Benchmark;
  