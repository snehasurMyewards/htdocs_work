const Controls = () => {
  return (
    <>
      <div className="d-grid gap-2 d-md-flex justify-content-md-center">
        <button type="button" className="btn btn-primary btn-lg px-4 me-md-2">
          Increment
        </button>
        <button type="button" className="btn btn-outline-secondary btn-lg px-4">
          Reset
        </button>
      </div>
    </>
  );
};

export default Controls;
